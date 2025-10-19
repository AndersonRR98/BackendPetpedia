<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::with('profile')->find($id);

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Usuario no encontrado'], 404);
        }

        return response()->json([
            'success' => true,
            'user' => $user,
            'profile' => $user->profile,
        ]);
    }

    public function update(Request $request)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Token inválido o expirado.'], 401);
        }

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Usuario no autenticado.'], 401);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'biography' => 'nullable|string|max:1000',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        // ✅ Actualizar o crear perfil
        $profileData = collect($validated)->only(['phone', 'address', 'biography'])->toArray();

        // Procesar la imagen si se subió
        if ($request->hasFile('photo')) {
            // Eliminar foto anterior si existe
            if ($user->profile && $user->profile->photo) {
                Storage::disk('public')->delete($user->profile->photo);
            }

            // Guardar nueva imagen
            $imagePath = $request->file('photo')->store('profiles', 'public');
            $profileData['photo'] = $imagePath;
        }

        $profile = $user->profile;
        if ($profile) {
            $profile->update($profileData);
        } else {
            $profile = Profile::create(array_merge(['user_id' => $user->id], $profileData));
        }

        // Cargar la relación de perfil actualizada
        $user->load('profile');

        // ✅ Respuesta
        return response()->json([
            'success' => true,
            'message' => 'Perfil actualizado correctamente.',
            'user' => $user,
            'profile' => $profile,
        ]);
    }
}
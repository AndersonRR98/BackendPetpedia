<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => ['required', Rule::in([1, 2, 3, 4])], // roles válidos

            // Veterinario
            'clinic_name' => 'required_if:role_id,1|string',
            'address' => 'required_if:role_id,1|string',
            'phone' => 'required_if:role_id,1|string',
            'schedules' => 'required_if:role_id,1|array',

            // Entrenador
            'specialty' => 'required_if:role_id,2|string',
            'experience_years' => 'required_if:role_id,2|numeric|min:0',
            'qualifications' => 'required_if:role_id,2|string',
            'phone' => 'required_if:role_id,2|string',

            // Refugio
            'address' => 'required_if:role_id,4|string',
            'responsible' => 'required_if:role_id,4|string',
            'phone' => 'required_if:role_id,4|string',

            // Imagen opcional
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        // Crear usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ]);

        // Subir foto si existe
        $imagePath = null;
        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('profiles', 'public');
        }

        // Perfil base
        $profileData = [
            'user_id' => $user->id,
            'image' => $imagePath,
        ];

        // Añadir datos según rol
        switch ($request->role_id) {
            case 1: // Veterinario
                $profileData += [
                    'clinic_name' => $request->clinic_name,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'schedules' => $request->schedules ? json_encode($request->schedules) : null,
                ];
                break;

            case 2: // Entrenador
                $profileData += [
                    'specialty' => $request->specialty,
                    'experience_years' => $request->experience_years,
                    'qualifications' => $request->qualifications,
                    'phone' => $request->phone,
                ];
                break;

            case 4: // Refugio
                $profileData += [
                    'address' => $request->address,
                    'responsible' => $request->responsible,
                    'phone' => $request->phone,
                ];
                break;
            // Cliente (role_id 3) solo datos básicos
        }

        Profile::create($profileData);

        // Generar token JWT
        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message' => 'Usuario registrado correctamente',
            'token' => $token,
            'user' => $user->load('profile', 'role'),
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Credenciales inválidas'], 401);
        }

        $user = User::with('role', 'profile')->where('email', $request->email)->first();

        return response()->json([
            'message' => 'Login exitoso',
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => [
                    'id' => $user->role->id,
                    'name' => $user->role->name,
                ],
                'profile' => $user->profile ?? null,
            ]
        ]);
    }

    public function me()
    {
        $user = JWTAuth::parseToken()->authenticate();
        return response()->json($user->load('profile', 'role'));
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Sesión cerrada correctamente']);
    }

    public function refresh()
    {
        $newToken = JWTAuth::refresh(JWTAuth::getToken());
        return response()->json(['token' => $newToken]);
    }

    // Endpoint para obtener roles
    public function roles()
    {
        return response()->json([
            ['id' => 1, 'name' => 'Veterinario'],
            ['id' => 2, 'name' => 'Entrenador'],
            ['id' => 3, 'name' => 'Cliente'],
            ['id' => 4, 'name' => 'Refugio'],
        ]);
    }
}
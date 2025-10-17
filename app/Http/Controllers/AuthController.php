<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use App\Models\Profile;
use App\Models\Veterinary;
use App\Models\Trainer;
use App\Models\Shelter;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // -------------------- REGISTER --------------------
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => ['required', Rule::in([1, 2, 3, 4])],
            'phone' => 'required|string|max:20',
            'address' => 'required|string',

            // Veterinaria
            'clinic_name' => 'required_if:role_id,2|string|max:255',
            'veterinary_license' => 'required_if:role_id,2|string|max:100',
            'specialization' => 'required_if:role_id,2|string|max:255',

            // Entrenador
            'specialty' => 'required_if:role_id,3|string|max:255',
            'experience_years' => 'required_if:role_id,3|integer|min:0',
            'qualifications' => 'required_if:role_id,3|string',
            'hourly_rate' => 'required_if:role_id,3|numeric|min:0',

            // Refugio
            'shelter_name' => 'required_if:role_id,4|string|max:255',
            'responsible_person' => 'required_if:role_id,4|string|max:255',
            'capacity' => 'required_if:role_id,4|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            // Crear usuario
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id,
            ]);

            // Perfil común
            Profile::create([
                'user_id' => $user->id,
                'phone' => $request->phone,
                'address' => $request->address,
                'biography' => $request->biography ?? '', // Valor por defecto si es null
            ]);

            // Tabla específica por rol
            switch ($request->role_id) {
                case 2: // Veterinaria
                    Veterinary::create([
                        'user_id' => $user->id,
                        'clinic_name' => $request->clinic_name,
                        'veterinary_license' => $request->veterinary_license,
                        'specialization' => $request->specialization,
                        'schedules' => $request->schedules ? json_encode($request->schedules) : json_encode($this->getDefaultVetSchedule()),
                        'image' => $request->image ?? 'pets/default.jpg',
                    ]);
                    break;

                case 3: // Entrenador
                    Trainer::create([ 
                        'user_id' => $user->id,
                        'specialty' => $request->specialty,
                        'experience_years' => $request->experience_years,
                        'qualifications' => $request->qualifications,
                        'hourly_rate' => $request->hourly_rate,
                        'rating' => 0,
                        'review_count' => 0,
                        'image' => $request->image ?? 'pets/default.jpg',
                    ]);
                    break;

                case 4: // Refugio
                    Shelter::create([
                        'user_id' => $user->id,
                        'shelter_name' => $request->shelter_name,
                        'responsible_person' => $request->responsible_person,
                        'capacity' => $request->capacity,
                        'rating' => 0,
                        'review_count' => 0,
                        'image' => $request->image ?? 'pets/default.jpg',
                    ]);
                    break;
            }

            // Generar token
            $token = JWTAuth::fromUser($user);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Usuario registrado exitosamente',
                'token' => $token,
                'user' => $user->load(['profile', 'role']),
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error en el registro: ' . $e->getMessage()
            ], 500);
        }
    }

    // -------------------- LOGIN --------------------
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Credenciales inválidas'
            ], 401);
        }

        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => auth()->user()->load('profile', 'role'),
        ]);
    }

    // -------------------- PERFIL USUARIO --------------------
    public function me()
    {
        return response()->json(auth()->user()->load('profile', 'role'));
    }

    // -------------------- LOGOUT --------------------
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Sesión cerrada correctamente']);
    }

    // -------------------- REFRESH TOKEN --------------------
    public function refresh()
    {
        return response()->json([
            'access_token' => auth()->refresh(),
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    // -------------------- LISTA DE ROLES --------------------
    public function getRoles()
    {
        return response()->json([
            ['id' => 1, 'name' => 'Cliente'],
            ['id' => 2, 'name' => 'Veterinaria'],
            ['id' => 3, 'name' => 'Entrenador'],
            ['id' => 4, 'name' => 'Refugio'],
        ]);
    }

    // Horarios por defecto veterinaria
    private function getDefaultVetSchedule(): array
    {
        return [
            'lunes' => ['08:00-12:00', '14:00-18:00'],
            'martes' => ['08:00-12:00', '14:00-18:00'],
            'miercoles' => ['08:00-12:00'],
            'jueves' => ['08:00-12:00', '14:00-18:00'],
            'viernes' => ['08:00-12:00', '14:00-18:00'],
            'sabado' => ['09:00-13:00'],
            'domingo' => ['Cerrado']
        ];
    }
}
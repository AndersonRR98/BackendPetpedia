<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => ['required', Rule::in([1, 2, 3, 4])], // 1:Vet, 2:Trainer, 3:Client, 4:Shelter

            // Veterinario
            'clinic_name' => 'required_if:role_id,1|string|max:255',
            'address' => 'required_if:role_id,1|string',
            'phone' => 'required_if:role_id,1|string|max:20',
            'veterinary_license' => 'required_if:role_id,1|string|max:100',
            'specialization' => 'required_if:role_id,1|string|max:255',
            'schedules' => 'sometimes|array',

            // Entrenador
            'specialty' => 'required_if:role_id,2|string|max:255',
            'experience_years' => 'required_if:role_id,2|integer|min:0',
            'qualifications' => 'required_if:role_id,2|string',
            'phone' => 'required_if:role_id,2|string|max:20',
            'hourly_rate' => 'required_if:role_id,2|numeric|min:0',

            // Refugio
            'shelter_name' => 'required_if:role_id,4|string|max:255',
            'address' => 'required_if:role_id,4|string',
            'responsible' => 'required_if:role_id,4|string|max:255',
            'phone' => 'required_if:role_id,4|string|max:20',
            'capacity' => 'required_if:role_id,4|integer|min:1',

            // Cliente
            'phone' => 'required_if:role_id,3|string|max:20',

            // Imagen
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'role_id.in' => 'El rol seleccionado no es válido.',
            'clinic_name.required_if' => 'El nombre de la clínica es requerido para veterinarios.',
            'veterinary_license.required_if' => 'La licencia veterinaria es requerida.',
            'specialty.required_if' => 'La especialidad es requerida para entrenadores.',
            'shelter_name.required_if' => 'El nombre del refugio es requerido.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            \DB::beginTransaction();

            // Crear usuario
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id,
            ]);

            // Subir foto si existe
            $imagePath = null;
            if ($request->hasFile('photo')) {
                $imagePath = $request->file('photo')->store('profiles', 'public');
            }

            // Preparar datos del perfil
            $profileData = [
                'user_id' => $user->id,
                'photo' => $imagePath,
                'phone' => $request->phone,
                'address' => $request->address,
                'biography' => $request->biography,
            ];

            // Datos específicos por rol
            switch ($request->role_id) {
                case 1: // Veterinario
                    $profileData += [
                        'clinic_name' => $request->clinic_name,
                        'veterinary_license' => $request->veterinary_license,
                        'specialization' => $request->specialization,
                        'schedules' => $request->schedules ? json_encode($request->schedules) : null,
                    ];
                    break;

                case 2: // Entrenador
                    $profileData += [
                        'specialty' => $request->specialty,
                        'experience_years' => $request->experience_years,
                        'qualifications' => $request->qualifications,
                        'hourly_rate' => $request->hourly_rate,
                    ];
                    break;

                case 4: // Refugio
                    $profileData += [
                        'shelter_name' => $request->shelter_name,
                        'responsible' => $request->responsible,
                        'capacity' => $request->capacity,
                    ];
                    break;
            }

            Profile::create($profileData);

            // Generar token
            $token = JWTAuth::fromUser($user);

            \DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Usuario registrado exitosamente',
                'token' => $token,
                'user' => $user->load(['profile', 'role']),
            ], 201);

        } catch (\Exception $e) {
            \DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error en el registro: ' . $e->getMessage()
            ], 500);
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'error' => 'Credenciales inválidas'
                ], 401);
            }

            $user = User::with(['role', 'profile'])
                        ->where('email', $request->email)
                        ->first();

            if (!$user->is_active) {
                return response()->json([
                    'success' => false,
                    'error' => 'Cuenta desactivada'
                ], 401);
            }

            return response()->json([
                'success' => true,
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
                    'profile' => $user->profile,
                    'email_verified_at' => $user->email_verified_at,
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Error en el login: ' . $e->getMessage()
            ], 500);
        }
    }

    public function me()
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            return response()->json([
                'success' => true,
                'user' => $user->load(['profile', 'role'])
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Usuario no autenticado'
            ], 401);
        }
    }

    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json([
                'success' => true,
                'message' => 'Sesión cerrada correctamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Error al cerrar sesión'
            ], 500);
        }
    }

    public function refresh()
    {
        try {
            $newToken = JWTAuth::refresh(JWTAuth::getToken());
            return response()->json([
                'success' => true,
                'token' => $newToken
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'No se pudo refrescar el token'
            ], 401);
        }
    }

    public function getRoles()
    {
        $roles = \App\Models\Role::where('is_active', true)
                                ->where('id', '!=', 5) // Excluir admin para registro público
                                ->get(['id', 'name', 'description']);

        return response()->json([
            'success' => true,
            'roles' => $roles
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index()
    {
        try {
            $services = Service::all();
            return response()->json($services, 200);
        } catch (\Exception $e) {
            Log::error('Error en index services: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            // Log de los datos recibidos
            Log::info('📥 Datos recibidos para crear servicio:', $request->all());

            // Validación
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'description' => 'required|string',
                'duration' => 'required|string|max:100',
                'trainer_id' => 'required|exists:trainers,id'
            ]);

            if ($validator->fails()) {
                Log::error('❌ Validación fallida:', $validator->errors()->toArray());
                return response()->json([
                    'error' => 'Validation failed',
                    'messages' => $validator->errors()
                ], 422);
            }

            // Crear servicio
            $service = Service::create([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'duration' => $request->duration,
                'trainer_id' => $request->trainer_id,
                'requestt_id' => null,
                'veterinary_id' => null
            ]);

            Log::info('✅ Servicio creado exitosamente:', $service->toArray());

            return response()->json($service, 201);

        } catch (\Exception $e) {
            Log::error('❌ Error al crear servicio: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json([
                'error' => 'Error al crear servicio',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $service = Service::findOrFail($id);
            return response()->json($service, 200);
        } catch (\Exception $e) {
            Log::error('Error al obtener servicio: ' . $e->getMessage());
            return response()->json(['error' => 'Servicio no encontrado'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            Log::info('📝 Actualizando servicio ID: ' . $id, $request->all());

            $service = Service::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'name' => 'sometimes|string|max:255',
                'price' => 'sometimes|numeric|min:0',
                'description' => 'sometimes|string',
                'duration' => 'sometimes|string|max:100',
                'trainer_id' => 'sometimes|exists:trainers,id'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => 'Validation failed',
                    'messages' => $validator->errors()
                ], 422);
            }

            $service->update($request->all());

            Log::info('✅ Servicio actualizado:', $service->toArray());

            return response()->json($service, 200);

        } catch (\Exception $e) {
            Log::error('❌ Error al actualizar servicio: ' . $e->getMessage());
            return response()->json([
                'error' => 'Error al actualizar servicio',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            Log::info('🗑️ Eliminando servicio ID: ' . $id);

            $service = Service::findOrFail($id);
            $service->delete();

            Log::info('✅ Servicio eliminado exitosamente');

            return response()->json(['message' => 'Servicio eliminado exitosamente'], 200);

        } catch (\Exception $e) {
            Log::error('❌ Error al eliminar servicio: ' . $e->getMessage());
            return response()->json([
                'error' => 'Error al eliminar servicio',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getByTrainer($id)
    {
        try {
            Log::info('📥 Obteniendo servicios para trainer_id: ' . $id);

            $services = Service::where('trainer_id', $id)
                ->orderBy('created_at', 'desc')
                ->get();
            
            Log::info('✅ Servicios encontrados: ' . $services->count());

            return response()->json($services, 200);

        } catch (\Exception $e) {
            Log::error('❌ Error al obtener servicios: ' . $e->getMessage());
            return response()->json([
                'error' => 'Error al obtener servicios',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
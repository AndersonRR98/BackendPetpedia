<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 


class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::included()->filter()->sort()->getOrPaginate();
        return response()->json($appointments);
    }

      public function store(Request $request)
    {
        Log::info('=== BACKEND: Creando cita ===');
        Log::info('Datos recibidos:', $request->all());
        
        $request->validate([
            'date' => 'required|date',
            'description' => 'required|string', 
            'status' => 'in:pending,confirmed,cancelled',    
            'trainer_id' => 'nullable|exists:trainers,id',
            'veterinary_id' => 'nullable|exists:veterinaries,id',
        ]);

        Log::info('✅ Validación pasada');

        try {
            $appointment = Appointment::create($request->all());
            Log::info('✅ CITA CREADA EN BD:', ['id' => $appointment->id]);
            
            return response()->json($appointment, 201);
        } catch (\Exception $e) {
            Log::error('❌ ERROR al crear cita en BD:', [
                'error' => $e->getMessage(),
                'data' => $request->all()
            ]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $appointment = Appointment::with(['trainer', 'veterinary'])->findOrFail($id);
        return response()->json($appointment);
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'date' => 'sometimes|date',
            'description' => 'sometimes|string', 
            'status' => 'in:pending,confirmed,cancelled',
            'trainer_id' => 'nullable|exists:trainers,id',
            'veterinary_id' => 'nullable|exists:veterinaries,id',
        ]);

        $appointment->update($request->all());
        return response()->json($appointment);
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}

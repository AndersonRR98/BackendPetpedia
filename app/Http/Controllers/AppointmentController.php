<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::included()->filter()->sort()->getOrPaginate();
        return response()->json($appointments);
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'description' => 'required|date_format:H:i:s',
            'status' => 'in:pending,confirmed,cancelled',
            'trainer_id' => 'nullable|exists:trainers,id',
            'veterinary_id' => 'nullable|exists:veterinaries,id',
        ]);

        $appointment = Appointment::create($request->all());
        return response()->json($appointment, 201);
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
            'description' => 'sometimes|date_format:H:i:s',
            'status' => 'sometimes|in:pending,confirmed,cancelled',
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

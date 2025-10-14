<?php

namespace App\Http\Controllers;

use App\Models\Requestt;
use Illuminate\Http\Request;

class RequesttController extends Controller
{
    public function index()
    {
        $requests = Requestt::included()->filter()->sort()->getOrPaginate();
        return response()->json($requests);
    }

    public function store(Request $request)
    {
        $request->validate([
            'priority' => 'required|in:low,medium,high,urgent',
            'application_status' => 'required|in:pending,accepted,rejected,finished',
            'adoption_id' => 'nullable|exists:adoptions,id',
            'user_id' => 'nullable|exists:users,id',
            'trainer_id' => 'nullable|exists:trainers,id',
        ]);

        $requestt = Requestt::create($request->all());
        return response()->json($requestt, 201);
    }

    public function show($id)
    {
        $requestt = Requestt::with(['adoption', 'user'])->findOrFail($id);
        return response()->json($requestt);
    }

    public function update(Request $request, Requestt $requestt)
    {
        $request->validate([
            'priority' => 'sometimes|in:low,medium,high,urgent',
            'application_status' => 'sometimes|in:pending,accepted,rejected,finished',
            'adoption_id' => 'nullable|exists:adoptions,id',
            'user_id' => 'nullable|exists:users,id',
            'trainer_id' => 'nullable|exists:trainers,id',
        ]);

        $requestt->update($request->all());
        return response()->json($requestt);
    }

    public function destroy(Requestt $requestt)
    {
        $requestt->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }

    public function getByTrainer($id)
    {
        $requests = Requestt::where('trainer_id', $id)->get();
        return response()->json($requests, 200);
    }

    // ✅ AGREGAR ESTOS DOS MÉTODOS
    public function accept($id)
    {
        $requestt = Requestt::findOrFail($id);
        
        $requestt->update([
            'application_status' => 'accepted'
        ]);

        return response()->json([
            'message' => 'Solicitud aceptada exitosamente',
            'request' => $requestt
        ], 200);
    }

    public function reject($id)
    {
        $requestt = Requestt::findOrFail($id);
        
        $requestt->update([
            'application_status' => 'rejected'
        ]);

        return response()->json([
            'message' => 'Solicitud rechazada',
            'request' => $requestt
        ], 200);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::included()->filter()->sort()->getOrPaginate();
        return response()->json($trainers);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'specialty' => 'required|string',
            'experience' => 'required|integer',
            'qualifications' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email|unique:trainers,email',
            'biography' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $trainer = Trainer::create($request->all());
        return response()->json($trainer, 201);
    }

    public function show($id)
    {
        $trainer = Trainer::findOrFail($id);
        return response()->json($trainer);
    }

    public function update(Request $request, Trainer $trainer)
    {
        $request->validate([
            'name' => 'sometimes|string',
            'specialty' => 'sometimes|string',
            'experience' => 'sometimes|integer',
            'qualifications' => 'sometimes|string',
            'phone' => 'sometimes|string',
            'email' => 'sometimes|email|unique:trainers,email,' . $trainer->id,
            'biography' => 'sometimes|string',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $trainer->update($request->all());
        return response()->json($trainer);
    }

    public function destroy(Trainer $trainer)
    {
        $trainer->delete();
        return response()->json(['message' => 'Eliminado con éxito']);
    }
}

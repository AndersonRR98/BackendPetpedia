<?php

namespace App\Http\Controllers;

use App\Models\Shelter;
use Illuminate\Http\Request;

class ShelterController extends Controller
{
    public function index()
    {
        $shelters = Shelter::included()->filter()->sort()->getOrPaginate();
        return response()->json($shelters);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:500',
            'responsible' => 'required|string|max:255',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $shelter = Shelter::create($request->all());
        return response()->json($shelter, 201);
    }

    public function show($id)
    {
        $shelter = Shelter::included()->findOrFail($id);
        return response()->json($shelter);
    }

    public function update(Request $request, Shelter $shelter)
    {
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:500',
            'responsible' => 'sometimes|string|max:255',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $shelter->update($request->all());
        return response()->json($shelter);
    }

    public function destroy(Shelter $shelter)
    {
        $shelter->delete();
        return response()->json(['message' => 'Refugio eliminado correctamente']);
    }
}
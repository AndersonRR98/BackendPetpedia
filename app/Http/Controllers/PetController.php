<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::included()->filter()->sort()->getOrPaginate();
        return response()->json($pets);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'age' => 'required|string',
            'species' => 'required|string',
            'breed' => 'nullable|string',
            'size' => 'nullable|numeric',
            'sex' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'shelter_id' => 'nullable|exists:shelters,id',
            'user_id' => 'nullable|exists:users,id',
            'veterinary_id' => 'nullable|exists:veterinaries,id',
        ]);

        $pet = Pet::create($data);
        return response()->json($pet, 201);
    }

    public function show(Pet $pet)
    {
        return response()->json($pet);
    }

    public function update(Request $request, Pet $pet)
    {
        $data = $request->validate([
            'name' => 'sometimes|string',
            'age' => 'sometimes|string',
            'species' => 'sometimes|string',
            'breed' => 'nullable|string',
            'size' => 'nullable|numeric',
            'sex' => 'sometimes|string',
            'description' => 'sometimes|string',
            'image' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'shelter_id' => 'nullable|exists:shelters,id',
            'user_id' => 'nullable|exists:users,id',
            'veterinary_id' => 'nullable|exists:veterinaries,id',
        ]);

        $pet->update($data);
        return response()->json($pet);
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();
        return response()->json(['message' => 'Mascota eliminada correctamente.']);
    }
}

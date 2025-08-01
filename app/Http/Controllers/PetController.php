<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'birth_date' => 'nullable|date',
            'shelter_id' => 'nullable|exists:shelters,id',
            'user_id' => 'nullable|exists:users,id',
            'veterinary_id' => 'nullable|exists:veterinaries,id',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('pets', 'public');
            $data['image_path'] = $path;
        }

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
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'birth_date' => 'nullable|date',
            'shelter_id' => 'nullable|exists:shelters,id',
            'user_id' => 'nullable|exists:users,id',
            'veterinary_id' => 'nullable|exists:veterinaries,id',
        ]);

        if ($request->hasFile('image')) {
            // Borrar imagen anterior si existe
            if ($pet->image_path) {
                Storage::disk('public')->delete($pet->image_path);
            }

            $path = $request->file('image')->store('pets', 'public');
            $data['image_path'] = $path;
        }

        $pet->update($data);
        return response()->json($pet);
    }

    public function destroy(Pet $pet)
    {
        if ($pet->image_path) {
            Storage::disk('public')->delete($pet->image_path);
        }

        $pet->delete();
        return response()->json(['message' => 'Mascota eliminada correctamente.']);
    }
}

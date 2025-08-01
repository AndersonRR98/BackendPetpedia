<?php

namespace App\Http\Controllers;

use App\Models\Veterinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VeterinaryController extends Controller
{
    public function index()
    {
        $vets = Veterinary::included()->filter()->sort()->getOrPaginate();
        return response()->json($vets);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:veterinaries,email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'schedules' => 'required|array',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $data = $request->only(['name', 'email', 'phone', 'address', 'schedules', 'user_id']);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('veterinaries', 'public');
            $data['image_path'] = $path;
        }

        $veterinary = Veterinary::create($data);
        return response()->json($veterinary, 201);
    }

    public function show($id)
    {
        $vet = Veterinary::findOrFail($id);
        return response()->json($vet);
    }

    public function update(Request $request, Veterinary $veterinary)
    {
        $request->validate([
            'name' => 'sometimes|string',
            'email' => 'sometimes|email|unique:veterinaries,email,' . $veterinary->id,
            'phone' => 'sometimes|string',
            'address' => 'sometimes|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'schedules' => 'sometimes|array',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $data = $request->only(['name', 'email', 'phone', 'address', 'schedules', 'user_id']);

        if ($request->hasFile('image')) {
            // Borra imagen anterior si existe
            if ($veterinary->image_path) {
                Storage::disk('public')->delete($veterinary->image_path);
            }

            $path = $request->file('image')->store('veterinaries', 'public');
            $data['image_path'] = $path;
        }

        $veterinary->update($data);
        return response()->json($veterinary);
    }

    public function destroy(Veterinary $veterinary)
    {
        // Borra imagen si existe
        if ($veterinary->image_path) {
            Storage::disk('public')->delete($veterinary->image_path);
        }

        $veterinary->delete();
        return response()->json(['message' => 'Eliminado con éxito']);
    }
}

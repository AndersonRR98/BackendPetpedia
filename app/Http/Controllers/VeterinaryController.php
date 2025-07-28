<?php

namespace App\Http\Controllers;

use App\Models\Veterinary;
use Illuminate\Http\Request;

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
        ]);

        $vet = Veterinary::create($request->all());
        return response()->json($vet, 201);
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
            'schedules' => 'sometimes|array',
        ]);

        $veterinary->update($request->all());
        return response()->json($veterinary);
    }

    public function destroy(Veterinary $veterinary)
    {
        $veterinary->delete();
        return response()->json(['message' => 'Eliminado con éxito']);
    }
}

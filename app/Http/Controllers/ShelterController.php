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
            'name' => 'required|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'responsible' => 'nullable|string',
        ]);

        $shelter = Shelter::create($request->all());
        return response()->json($shelter, 201);
    }

    public function show($id)
    {
        $shelter = Shelter::findOrFail($id);
        return response()->json($shelter);
    }

    public function update(Request $request, Shelter $shelter)
    {
        $request->validate([
            'name' => 'sometimes|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'responsible' => 'nullable|string',
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

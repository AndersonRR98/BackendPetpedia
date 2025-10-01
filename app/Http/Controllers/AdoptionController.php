<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    public function index()
    {
        $adoptions = Adoption::with(['pet'])
       -> included()->filter()->sort()->getOrPaginate();
        return response()->json($adoptions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
            'comment' => 'nullable|string',
            'pet_id' => 'nullable|exists:pets,id',
            'shelter_id' => 'nullable|exists:shelters,id',
        ]);

        $adoption = Adoption::create($request->all());
        return response()->json($adoption, 201);
    }

    public function show($id)
    {
        $adoption = Adoption::with(['pet', 'shelter'])->findOrFail($id);
        return response()->json($adoption);
    }

    public function update(Request $request, Adoption $adoption)
    {
        $request->validate([
            'status' => 'sometimes|in:pending,approved,rejected',
            'comment' => 'nullable|string',
            'pet_id' => 'nullable|exists:pets,id',
            'shelter_id' => 'nullable|exists:shelters,id',
        ]);

        $adoption->update($request->all());
        return response()->json($adoption);
    }

    public function destroy(Adoption $adoption)
    {
        $adoption->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}

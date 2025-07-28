<?php

namespace App\Http\Controllers;

use App\Models\Shoppingcar;
use Illuminate\Http\Request;

class ShoppingcarController extends Controller
{
    public function index()
    {
        $shoppingcars = Shoppingcar::included()->filter()->sort()->getOrPaginate();
        return response()->json($shoppingcars);
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $shoppingcar = Shoppingcar::create($request->all());
        return response()->json($shoppingcar, 201);
    }

    public function show($id)
    {
        $shoppingcar = Shoppingcar::with('user')->findOrFail($id);
        return response()->json($shoppingcar);
    }

    public function update(Request $request, Shoppingcar $shoppingcar)
    {
        $request->validate([
            'amount' => 'sometimes|numeric',
            'date' => 'sometimes|date',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $shoppingcar->update($request->all());
        return response()->json($shoppingcar);
    }

    public function destroy(Shoppingcar $shoppingcar)
    {
        $shoppingcar->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}

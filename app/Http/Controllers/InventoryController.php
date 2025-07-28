<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        return Inventory::with('product')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'available_quantities' => 'required|integer|min:0',
            'product_id' => 'nullable|exists:products,id',
        ]);

        return Inventory::create($validated);
    }

    public function show(Inventory $inventory)
    {
        return $inventory->load('product');
    }

    public function update(Request $request, Inventory $inventory)
    {
        $validated = $request->validate([
            'available_quantities' => 'sometimes|integer|min:0',
            'product_id' => 'nullable|exists:products,id',
        ]);

        $inventory->update($validated);
        return $inventory;
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return response()->noContent();
    }
}

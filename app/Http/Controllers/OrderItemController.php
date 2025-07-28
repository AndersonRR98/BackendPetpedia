<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        return OrderItem::with(['order', 'product'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'order_id' => 'nullable|exists:orders,id',
            'product_id' => 'nullable|exists:products,id',
        ]);

        return OrderItem::create($validated);
    }

    public function show(OrderItem $orderItem)
    {
        return $orderItem->load(['order', 'product']);
    }

    public function update(Request $request, OrderItem $orderItem)
    {
        $validated = $request->validate([
            'quantity' => 'sometimes|integer|min:1',
            'price' => 'sometimes|numeric|min:0',
            'order_id' => 'nullable|exists:orders,id',
            'product_id' => 'nullable|exists:products,id',
        ]);

        $orderItem->update($validated);
        return $orderItem;
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();
        return response()->noContent();
    }
}

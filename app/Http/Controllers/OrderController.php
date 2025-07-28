<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::included()->filter()->sort()->getOrPaginate();
        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|in:pending,completed,cancelled',
            'total_amount' => 'required|numeric',
            'order_date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $order = Order::create($request->all());
        return response()->json($order, 201);
    }

    public function show(Order $order)
    {
        return response()->json($order->load('user'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'in:pending,completed,cancelled',
            'total_amount' => 'numeric',
            'order_date' => 'date',
            'user_id' => 'exists:users,id',
        ]);

        $order->update($request->all());
        return response()->json($order);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index()
    {
        $shipments = Shipment::included()->filter()->sort()->getOrPaginate();
        return response()->json($shipments);
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string',
            'cost' => 'required|numeric',
            'shipping_method' => 'required|string',
            'status' => 'required|in:pending,shipped,delivered,cancelled',
            'order_id' => 'required|exists:orders,id',
        ]);

        $shipment = Shipment::create($request->all());
        return response()->json($shipment, 201);
    }

    public function show(Shipment $shipment)
    {
        return response()->json($shipment->load('order'));
    }

    public function update(Request $request, Shipment $shipment)
    {
        $request->validate([
            'address' => 'string',
            'cost' => 'numeric',
            'shipping_method' => 'string',
            'status' => 'in:pending,shipped,delivered,cancelled',
            'order_id' => 'exists:orders,id',
        ]);

        $shipment->update($request->all());
        return response()->json($shipment);
    }

    public function destroy(Shipment $shipment)
    {
        $shipment->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}

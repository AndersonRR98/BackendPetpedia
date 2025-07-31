<?php

namespace App\Http\Controllers;

use App\Models\Paymentmetho;
use Illuminate\Http\Request;

class PaymentmethoController extends Controller
{
    public function index()
    {
        $methods = Paymentmetho::with('payment')->included()->filter()->sort()->getOrPaginate();
        return response()->json($methods);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'description' => 'required|string',
            'date_issued' => 'required|date',
            'payment_id' => 'required|exists:payments,id',
        ]);

        $method = Paymentmetho::create($request->all());
        return response()->json($method, 201);
    }

    public function show($id)
    {
        $method = Paymentmetho::with('payment')->findOrFail($id);
        return response()->json($method);
    }

    public function update(Request $request, Paymentmetho $paymentmetho)
    {
        $request->validate([
            'type' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'date_issued' => 'sometimes|date',
            'payment_id' => 'sometimes|exists:payments,id',
        ]);

        $paymentmetho->update($request->all());
        return response()->json($paymentmetho);
    }

    public function destroy(Paymentmetho $paymentmetho)
    {
        $paymentmetho->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['user', 'paymentable'])->included()->filter()->sort()->getOrPaginate();
        return response()->json($payments);
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'status' => 'required|in:pending,completed,failed',
            'user_id' => 'required|exists:users,id',
            'paymentable_type' => 'required|string'
        ]);

        $payment = Payment::create([
            'amount' => $request->amount,
            'date' => $request->date,
            'status' => $request->status,
            'user_id' => $request->user_id,
            'paymentable_type' => $request->paymentable_type
        ]);

        return response()->json($payment, 201);
    }

    public function show($id)
    {
        $payment = Payment::with(['user', 'paymentable'])->findOrFail($id);
        return response()->json($payment);
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'amount' => 'sometimes|numeric|min:0',
            'date' => 'sometimes|date',
            'status' => 'sometimes|in:pending,completed,failed',
            'user_id' => 'sometimes|exists:users,id',
            'paymentable_type' => 'sometimes|string'
        ]);

        $payment->update($request->all());
        return response()->json($payment);
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}

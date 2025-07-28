<?php

namespace App\Http\Controllers;

use App\Models\Requestt;
use Illuminate\Http\Request;

class RequesttController extends Controller
{
    public function index()
    {
        $requests = Requestt::included()->filter()->sort()->getOrPaginate();
        return response()->json($requests);
    }

    public function store(Request $request)
    {
        $request->validate([
            'priority' => 'required|in:low,medium,high,urgent',
            'application_status' => 'required|in:accepted,finished',
            'adoption_id' => 'nullable|exists:adoptions,id',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $requestt = Requestt::create($request->all());
        return response()->json($requestt, 201);
    }

    public function show($id)
    {
        $requestt = Requestt::with(['adoption', 'user'])->findOrFail($id);
        return response()->json($requestt);
    }

    public function update(Request $request, Requestt $requestt)
    {
        $request->validate([
            'priority' => 'sometimes|in:low,medium,high,urgent',
            'application_status' => 'sometimes|in:accepted,finished',
            'adoption_id' => 'nullable|exists:adoptions,id',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $requestt->update($request->all());
        return response()->json($requestt);
    }

    public function destroy(Requestt $requestt)
    {
        $requestt->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}

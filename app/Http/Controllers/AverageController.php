<?php

namespace App\Http\Controllers;

use App\Models\Average;
use Illuminate\Http\Request;

class AverageController extends Controller
{
    public function index()
    {
        $averages = Average::included()->filter()->sort()->getOrPaginate();
        return response()->json($averages);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'url' => 'required|url',
            'upload_date' => 'nullable|date',
            'topic_id' => 'nullable|exists:topics,id',
            'answer_id' => 'nullable|exists:answers,id',
        ]);

        $average = Average::create($request->all());
        return response()->json($average, 201);
    }

    public function show($id)
    {
        $average = Average::with(['topic', 'answer'])->findOrFail($id);
        return response()->json($average);
    }

    public function update(Request $request, Average $average)
    {
        $request->validate([
            'type' => 'sometimes|string',
            'url' => 'sometimes|url',
            'upload_date' => 'nullable|date',
            'topic_id' => 'nullable|exists:topics,id',
            'answer_id' => 'nullable|exists:answers,id',
        ]);

        $average->update($request->all());
        return response()->json($average);
    }

    public function destroy(Average $average)
    {
        $average->delete();
        return response()->json(['message' => 'Eliminado con éxito']);
    }
}

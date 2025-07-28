<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
        $answers = Answer::included()->filter()->sort()->getOrPaginate();
        return response()->json($answers);
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'creation_date' => 'required|date',
            'topic_id' => 'nullable|exists:topics,id',
        ]);

        $answer = Answer::create($request->all());
        return response()->json($answer, 201);
    }

    public function show($id)
    {
        $answer = Answer::with('topic')->findOrFail($id);
        return response()->json($answer);
    }

    public function update(Request $request, Answer $answer)
    {
        $request->validate([
            'content' => 'sometimes|string',
            'creation_date' => 'sometimes|date',
            'topic_id' => 'nullable|exists:topics,id',
        ]);

        $answer->update($request->all());
        return response()->json($answer);
    }

    public function destroy(Answer $answer)
    {
        $answer->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}

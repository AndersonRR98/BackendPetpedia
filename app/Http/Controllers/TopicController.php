<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
    {
        // Si estás usando los scopes personalizados como included(), filter(), sort(), getOrPaginate()
        $topics = Topic::included()->filter()->sort()->getOrPaginate();
        return response()->json($topics);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'creation_date' => 'required|date',
            'forum_id' => 'nullable|exists:forums,id',
        ]);

        $topic = Topic::create($request->all());
        return response()->json($topic, 201);
    }

    public function show($id)
    {
        $topic = Topic::with('forum')->findOrFail($id);
        return response()->json($topic);
    }

    public function update(Request $request, Topic $topic)
    {
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'creation_date' => 'sometimes|date',
            'forum_id' => 'nullable|exists:forums,id',
        ]);

        $topic->update($request->all());
        return response()->json($topic);
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}

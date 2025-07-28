<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        //$perPage = request('per_page', 10);
  $forums = Forum::included()->filter()->sort()->getOrPaginate();
  return response()->json($forums);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'creation_date' => 'required|date',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $forum = Forum::create($request->all());
        return response()->json($forum, 201);
    }

    public function show($id)
    {
        $forum = Forum::with('user')->findOrFail($id);
        return response()->json($forum);
    }

    public function update(Request $request, Forum $forum)
    {
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'creation_date' => 'sometimes|date',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $forum->update($request->all());
        return response()->json($forum);
    }

    public function destroy(Forum $forum)
    {
        $forum->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::included()->filter()->sort()->getOrPaginate();
        return response()->json($notifications);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
            'appointment_id' => 'nullable|exists:appointments,id',
        ]);

        $notification = Notification::create($request->all());
        return response()->json($notification, 201);
    }

    public function show($id)
    {
        $notification = Notification::with(['user', 'appointment'])->findOrFail($id);
        return response()->json($notification);
    }

    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'user_id' => 'nullable|exists:users,id',
            'appointment_id' => 'nullable|exists:appointments,id',
        ]);

        $notification->update($request->all());
        return response()->json($notification);
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}

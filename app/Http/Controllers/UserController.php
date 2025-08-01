<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::with('role')->get());
    }

    public function create()
    {
        return response()->json(['roles' => Role::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'role_id' => 'nullable|exists:roles,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('users', 'public');
            $validated['image_path'] = $path;
        }

        $user = User::create($validated);

        return response()->json($user, 201);
    }

    public function show($id)
    {
        $user = User::with('role')->findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'password' => 'sometimes|string|min:6',
            'role_id' => 'nullable|exists:roles,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        if ($request->hasFile('image')) {
            if ($user->image_path) {
                Storage::disk('public')->delete($user->image_path);
            }
            $path = $request->file('image')->store('users', 'public');
            $validated['image_path'] = $path;
        }

        $user->update($validated);

        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->image_path) {
            Storage::disk('public')->delete($user->image_path);
        }

        $user->delete();

        return response()->json(['message' => 'Usuario eliminado']);
    }
}

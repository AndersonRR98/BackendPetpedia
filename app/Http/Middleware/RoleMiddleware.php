<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $roleId)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if ((int) $user->role_id !== (int) $roleId) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        return $next($request);
    }
}

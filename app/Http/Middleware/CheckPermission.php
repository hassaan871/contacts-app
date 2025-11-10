<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission): Response
    {
        $sessionUser = session('user');

        if (!$sessionUser) {
            return redirect('/login');
        }

        $user = User::with('role.permissions')->find($sessionUser->id);

        $userPermissions = $user->role->permissions->pluck('name')->unique();

        if (!$userPermissions->contains($permission)) {
            abort(403, "You do not have permission to access this resource.");
        }

        return $next($request);
    }
}

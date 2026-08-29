<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        $roleId = $user->role_id;

        // Mapping role_id ke nama role
        $roles = [
            1 => 'admin',
            2 => 'pakar',
            3 => 'pasien'
        ];

        $userRole = strtolower($roles[$roleId] ?? '');

        if ($userRole !== strtolower($role)) {
            return redirect('/')->withErrors(['akses' => 'Anda tidak memiliki akses ke halaman ini']);
        }

        return $next($request);
    }
}

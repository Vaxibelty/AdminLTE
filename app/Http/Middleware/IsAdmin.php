<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Gunakan guard 'web' dan periksa apakah pengguna adalah admin
        if (Auth::guard('web')->check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Jika pengguna bukan admin, arahkan ke halaman login dengan pesan error
        return redirect('login')->withErrors('You do not have admin access.');
    }
}

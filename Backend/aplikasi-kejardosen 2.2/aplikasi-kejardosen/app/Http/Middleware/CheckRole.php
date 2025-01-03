<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Cek apakah pengguna login sesuai guard yang diminta
        if (!Auth::guard($role)->check()) {
            // Redirect ke halaman login sesuai role
            return redirect()->route("login.$role");
        }

        // Jika pengguna sudah login, lanjutkan ke rute berikutnya
        return $next($request);
    }
}

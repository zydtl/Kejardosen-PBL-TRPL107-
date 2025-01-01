<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Jika belum login sebagai mahasiswa, arahkan ke halaman login mahasiswa
        if (!Auth::guard('mahasiswa')->check()) {
            return redirect()->route('login.mahasiswa');
        }

        // Jika sudah login, lanjutkan request
        return $next($request);
    }
}

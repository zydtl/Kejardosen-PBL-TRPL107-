<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Jika belum login sebagai dosen, arahkan ke halaman login dosen
        if (!Auth::guard('dosen')->check()) {
            return redirect()->route('login.dosen');
        }
        // Jika sudah login, lanjutkan request
        return $next($request);
    }
}

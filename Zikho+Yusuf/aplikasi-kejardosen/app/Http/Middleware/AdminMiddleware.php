<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Jika belum login sebagai admin, arahkan ke halaman login admin
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('login.admin');
        }

        // Jika sudah login, lanjutkan request
        return $next($request);
    }
}

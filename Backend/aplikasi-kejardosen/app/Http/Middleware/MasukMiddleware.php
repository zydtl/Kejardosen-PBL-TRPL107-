<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Symfony\Component\HttpFoundation\Response;

class MasukMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna sudah login menggunakan guard 'admin'
        if (!Auth::guard('admin')->check()) {
            // Jika belum login, arahkan ke halaman login admin
            return redirect()->route('login.admin');
        }

        // Jika sudah login, lanjutkan ke proses berikutnya (halaman dashboard, dsb)
        return $next($request);
    }
}

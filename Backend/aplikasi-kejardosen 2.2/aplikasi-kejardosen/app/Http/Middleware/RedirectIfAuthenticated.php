<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, ...$guards)
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Arahkan pengguna yang sudah login ke dashboard sesuai peran
                switch ($guard) {
                    case 'admin':
                        return redirect()->route('admin.dashboard');
                    case 'dosen':
                        return redirect()->route('dosen.dashboard');
                    case 'mahasiswa':
                        return redirect()->route('mahasiswa.dashboard');
                }
            }
        }

        return $next($request);
    }
}

<?php

namespace App\Providers;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\DosenMiddleware;
use App\Http\Middleware\MahasiswaMiddleware;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The namespace to be used with controller routes.
     *
     * @var string
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // Daftarkan alias untuk middleware
        $this->app['router']->aliasMiddleware('admin', AdminMiddleware::class);
        $this->app['router']->aliasMiddleware('dosen', DosenMiddleware::class);
        $this->app['router']->aliasMiddleware('mahasiswa', MahasiswaMiddleware::class);
    }

    /**
     * Define the routes for your application.
     *
     * @return void
     */
    public function map()
    {
        // Rute yang memerlukan middleware sesuai dengan role
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));

        // Pisahkan grup rute berdasarkan middleware role
        Route::middleware('admin')->group(base_path('routes/admin.php'));
        Route::middleware('dosen')->group(base_path('routes/dosen.php'));
        Route::middleware('mahasiswa')->group(base_path('routes/mahasiswa.php'));
    }
}

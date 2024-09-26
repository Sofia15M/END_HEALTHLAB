<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Este espacio de nombres se aplica a los controladores de rutas.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define la "home" para la aplicación.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Cargar las rutas
        parent::boot();
    }

    /**
     * Define las rutas de la aplicación.
     *
     * @return void
     */
    public function map(): void
    {
        $this->mapApiRoutes();  // Mapea las rutas API
        $this->mapWebRoutes();  // Mapea las rutas Web

        // Si tienes rutas para consola o canales puedes mapearlas aquí
    }

    /**
     * Define las rutas API para la aplicación.
     *
     * @return void
     */
    protected function mapApiRoutes(): void
    {
        Route::prefix('api')  // Prefijo para las rutas API
            ->middleware('api')  // Middleware aplicado
            ->namespace($this->namespace)  // Espacio de nombres de los controladores
            ->group(base_path('routes/api.php'));  // Carga las rutas del archivo api.php
    }

    /**
     * Define las rutas web para la aplicación.
     *
     * @return void
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware('web')  // Middleware para web
            ->namespace($this->namespace)  // Espacio de nombres de los controladores
            ->group(base_path('routes/web.php'));  // Carga las rutas del archivo web.php
    }
}

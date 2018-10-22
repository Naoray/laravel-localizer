<?php

namespace Naoray\LaravelLocalizer;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class LaravelLocalizerServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $namespace = 'Naoray\LaravelLocalizer\Http\Controllers';

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../routes/web.php');

        $router->aliasMiddleware('localize', \Naoray\LaravelLocalizer\Http\Middleware\Localize::class);
    }
}

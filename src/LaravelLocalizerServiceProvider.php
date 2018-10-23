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

        $router->aliasMiddleware('localize', \CodeZero\Localizer\Middleware\SetLocale::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Localizer::class, function ($app) {
            $locales = $app['config']->get('localizer.supported-locales');
            $detectors = $app['config']->get('localizer.detectors');
            $stores = $app['config']->get('localizer.stores');

            return new Localizer($locales, $detectors, $stores);
        });
    }
}

<?php

namespace Naoray\LaravelLocalizer\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \CodeZero\Localizer\LocalizerServiceProvider::class,
            \Naoray\LaravelLocalizer\LaravelLocalizerServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application   $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.key', '6rE9Nz59bGRbeMATftriyQjrpF7DcOQm');
        $app['config']->set('localizer.stores', array_merge(config('localizer.stores'), [\Naoray\LaravelLocalizer\Stores\CarbonStore::class]));
    }
}

<?php

namespace Naoray\LaravelLocalizer\Facades;

use Illuminate\Support\Facades\Facade;
use Naoray\LaravelLocalizer\Localizer;

class LocalizerFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Localizer::class;
    }
}

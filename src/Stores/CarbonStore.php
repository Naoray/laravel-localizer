<?php

namespace Naoray\LaravelLocalizer\Stores;

use CodeZero\Localizer\Stores\Store;
use Illuminate\Support\Carbon;

class CarbonStore implements Store
{
    /**
     * Store the given locale.
     *
     * @param string $locale
     *
     * @return void
     */
    public function store($locale)
    {
        Carbon::setLocale($locale);
    }
}

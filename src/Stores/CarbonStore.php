<?php

namespace Naoray\LaravelLocalizer\Stores;

use Illuminate\Support\Carbon;
use CodeZero\Localizer\Stores\Store;

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

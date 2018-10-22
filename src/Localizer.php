<?php

namespace Naoray\LaravelLocalizer;

use Illuminate\Support\Carbon;

class Localizer
{
    /**
     * Set locale in app.
     *
     * @param string $locale
     * @return void
     */
    public function setLocale($locale)
    {
        app()->setLocale($locale);
        Carbon::setLocale($locale);
    }

    /**
     * Checks if locale is allowed.
     *
     * @param string $locale
     * @return bool
     */
    public function isAllowed($locale)
    {
        return in_array($locale, self::allowedLanguages());
    }

    /**
     * Get a list of all inactive locales.
     *
     * @return array
     */
    public static function allowedLanguages()
    {
        return config('app.allowed_locales');
    }
}

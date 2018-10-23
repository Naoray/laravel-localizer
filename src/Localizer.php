<?php

namespace Naoray\LaravelLocalizer;

use CodeZero\Localizer\Localizer as BaseLocalizer;

class Localizer extends BaseLocalizer
{
    /**
     * @var Localizer
     */
    protected static $instance;

    /**
     * Create a new Localizer instance.
     *
     * @param \Illuminate\Support\Collection|array $locales
     * @param \Illuminate\Support\Collection|array $detectors
     * @param \Illuminate\Support\Collection|array $stores
     */
    public function __construct($locales, $detectors, $stores = [])
    {
        parent::__construct($locales, $detectors, $stores);

        self::$instance = $this;
    }

    /**
     * Check if the given locale is supported.
     *
     * @param mixed $locale
     *
     * @return bool
     */
    public function isSupportedLocale($locale)
    {
        return in_array($locale, $this->locales);
    }

    /**
     * Get a list of all inactive locales.
     *
     * @return array
     */
    public static function allowedLocales()
    {
        return self::$instance->locales;
    }
}

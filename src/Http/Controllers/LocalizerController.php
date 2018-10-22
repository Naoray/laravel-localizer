<?php

namespace Naoray\LaravelLocalizer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Naoray\LaravelLocalizer\Localizer;

class LocalizerController extends Controller
{
    /**
     * @var Localizer
     */
    protected $localizer;

    /**
     * @param Localizer $localizer
     */
    public function __construct(Localizer $localizer)
    {
        $this->localizer = $localizer;
    }

    /**
     * Set Locale.
     *
     * @param string $locale
     * @param Illuminate\Http\Request $request
     * @return void
     */
    public function setLocale($locale, Request $request)
    {
        abort_if(!$this->localizer->isAllowed($locale), 403);

        $request->session()->put('locale', $locale);

        return redirect()->back();
    }
}

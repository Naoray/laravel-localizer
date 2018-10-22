<?php

namespace Naoray\LaravelLocalizer\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Naoray\LaravelLocalizer\Localizer;

class Localize
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
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->setLanguage($request);

        return $next($request);
    }

    /**
     * Set Language.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function setLanguage($request)
    {
        if ($request->session()->has('locale') && $this->localizer->isAllowed(session('locale'))) {
            return $this->localizer->setLocale(session('locale'));
        }

        $this->localizer->setLocale(config('app.fallback_locale'));
    }
}

<?php

namespace Naoray\LaravelLocalizer\Tests\Feature;

use Illuminate\Support\Carbon;
use Naoray\LaravelLocalizer\Tests\TestCase;

class SetLocaleTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();

        $this->app['config']->set('localizer.supported-locales', ['en', 'de']);
    }

    /** @test */
    public function it_can_store_locale_in_carbon_instance()
    {
        $this->withoutExceptionHandling();
        $this->assertEquals(Carbon::getLocale(), 'en');

        $this->get(route('localizer::setLocale', ['de']));

        $this->assertEquals(Carbon::getLocale(), 'de');
    }

    /** @test */
    public function it_can_change_locale_settings_via_get_request()
    {
        $this->assertLocaleChange(
            $this->get(route('localizer::setLocale', ['de'])),
            'de'
        );

        $this->assertLocaleChange(
            $this->get(route('localizer::setLocale', ['en'])),
            'en'
        );
    }

    /** @test */
    public function it_aborts_with_403_if_locale_is_not_supported()
    {
        $response = $this->get(route('localizer::setLocale', ['fr']));

        $response->assertStatus(403);
    }

    /**
     * Assert response check.
     *
     * @param \Illuminate\Foundation\Testing\TestResponse $response
     * @param string $locale
     * @return void
     */
    public function assertLocaleChange($response, $locale)
    {
        $response->assertStatus(302)
            ->assertSessionHas(config('localizer.session-key'), $locale)
            ->assertCookie(config('localizer.cookie-name'), $locale);

        $this->assertEquals(app()->getLocale(), $locale);
    }
}

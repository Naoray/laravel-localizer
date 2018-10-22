<?php

namespace Naoray\LaravelLocalizer\Tests\Feature;

use Naoray\LaravelLocalizer\Tests\TestCase;

class LocalizerTest extends TestCase
{
    /** @test */
    public function it_can_change_languages_in_session()
    {
        $this->assertEquals('en', app()->getLocale());

        $response = $this->get(route('setLocale', ['de']));

        $response->isOk();
        $response->assertSessionHas('locale', 'de');
    }
}

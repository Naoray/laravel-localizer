<?php

namespace Naoray\LaravelLocalizer\Tests\Unit;

use Naoray\LaravelLocalizer\Tests\TestCase;
use Naoray\LaravelLocalizer\Facades\LocalizerFacade;

class LocalizerTest extends TestCase
{
    /** @test */
    public function it_can_use_the_facade_to_get_all_locales()
    {
        $this->assertEquals(config('localizer.supported-locales'), LocalizerFacade::allowedLocales());
    }
}

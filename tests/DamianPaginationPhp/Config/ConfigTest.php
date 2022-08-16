<?php

namespace Tests\DamianPaginationPhp\Config;

use Tests\BaseTest;
use DamianPaginationPhp\Config\Config;

class ConfigTest extends BaseTest
{
    public function testConfig(): void
    {
        $this->assertSame('en', Config::get()['lang']);

        $this->assertTrue(is_array(Config::get()));

        // Et on change la langue.
        Config::set(['lang' => 'fr']);

        $this->assertSame('fr', Config::get()['lang']);

        $this->assertTrue(is_array(Config::get()));
    }
}

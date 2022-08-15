<?php

namespace Tests\DamianPaginationPhp\Config;

use PHPUnit\Framework\TestCase;
use DamianPaginationPhp\Config\Config;

class ConfigTest extends TestCase
{
    public function testConfig()
    {
        $this->assertSame('en', Config::get()['lang']);

        $this->assertTrue(is_array(Config::get()));

        // Et on change la langue.
        Config::set(['lang' => 'fr']);

        $this->assertSame('fr', Config::get()['lang']);

        $this->assertTrue(is_array(Config::get()));
    }
}

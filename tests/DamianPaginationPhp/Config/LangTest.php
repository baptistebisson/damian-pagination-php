<?php

namespace Tests\DamianPaginationPhp\Config;

use PHPUnit\Framework\TestCase;
use DamianPaginationPhp\Config\Lang;

class LangTest extends TestCase
{
    public function testLang()
    {
        $this->assertTrue(is_array(Lang::getInstance()->pagination()));
    }
}

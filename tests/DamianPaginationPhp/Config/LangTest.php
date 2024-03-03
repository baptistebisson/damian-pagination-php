<?php

declare(strict_types=1);

namespace Tests\DamianPaginationPhp\Config;

use Tests\BaseTest;
use DamianPaginationPhp\Config\Lang;

class LangTest extends BaseTest
{
    public function testLang(): void
    {
        $this->assertTrue(is_array(Lang::getInstance()->pagination()));
    }
}

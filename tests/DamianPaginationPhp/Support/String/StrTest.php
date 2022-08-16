<?php

namespace Tests\DamianPaginationPhp\Support\String;

use Tests\BaseTest;
use DamianPaginationPhp\Support\String\Str;

class StrTest extends BaseTest
{
    public function testContains(): void
    {
        $test = 'testaaa';

        $this->assertTrue(Str::contains($test,  'aaa'));

        $this->assertFalse(Str::contains($test,  'aaabbb'));
    }
    
    public function testInputHiddenIfHasQueryString(): void
    {
        $this->assertTrue(is_string(Str::inputHiddenIfHasQueryString(['except' => ['except_test_1', 'except_test_2']])));
    }
}

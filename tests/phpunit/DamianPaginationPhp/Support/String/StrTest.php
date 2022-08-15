<?php

namespace Tests\DamianPaginationPhp\Support\String;

use PHPUnit\Framework\TestCase;
use DamianPaginationPhp\Support\String\Str;

class StrTest extends TestCase
{
    public function testContains(): void
    {
        $test = 'testaaa';

        $this->assertTrue(Str::contains($test,  'aaa'));

        $this->assertFalse(Str::contains($test,  'aaabbb'));
    }
    
    public function testInputHiddenIfHasQueryString()
    {
        $this->assertTrue(is_string(Str::inputHiddenIfHasQueryString(['except' => ['except_test_1', 'except_test_2']])));
    }
}

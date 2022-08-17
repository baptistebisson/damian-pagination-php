<?php

namespace Tests\DamianPaginationPhp\Support\Request;

use Tests\BaseTest;
use DamianPaginationPhp\Support\Request\Request;

class RequestTest extends BaseTest
{
    public function testGetGet(): void
    {
        $_GET['p'] = 1;

        $request = new Request();

        $this->assertFalse($request->getGet()->has('pp'));

        $this->assertTrue($request->getGet()->has('p'));

        $this->assertSame(1, $request->getGet()->get('p'));

        $_GET = [];
    }

    public function testGetServer(): void
    {
        $request = new Request();

        $this->assertTrue(is_array($request->getServer()->all()));
    }

    public function testIsAjax(): void
    {
        $request = new Request();

        $this->assertFalse($request->isAjax()); // en testing on est en cli
    }

    public function testGetUrlCurrent(): void
    {
        $request = new Request();

        $this->assertTrue(is_string($request->getUrlCurrent()));
    }

    public function testGetFullUrlWithQuery(): void
    {
        $request = new Request();

        $this->assertSame('://?page=1', $request->getFullUrlWithQuery(['page' => 1]));
    }

    public function testBuildQuery(): void
    {
        $request = new Request();

        $this->assertSame('page=1', $request->buildQuery(['page' => 1]));

        $this->assertSame('page=1&orderby=title&order=asc', $request->buildQuery(['page' => 1, 'orderby' => 'title', 'order' => 'asc']));
    }
}

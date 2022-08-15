<?php

namespace Tests\DamianPaginationPhp\Support\Request;

use PHPUnit\Framework\TestCase;
use DamianPaginationPhp\Support\Request\Request;

class RequestTest extends TestCase
{
    public function testGetGet()
    {
        $_GET['p'] = 1;

        $request = new Request();

        $this->assertFalse($request->getGet()->has('pp'));

        $this->assertTrue($request->getGet()->has('p'));

        $this->assertSame(1, $request->getGet()->get('p'));

        $_GET = [];
    }
    
    public function testGetServer()
    {
        $request = new Request();

        $this->assertTrue(is_array($request->getServer()->all()));
    }
    
    public function testIsAjax()
    {
        $request = new Request();

        $this->assertFalse($request->isAjax()); // en testing on est en cli
    }
    
    public function testGetUrlCurrent()
    {
        $request = new Request();

        $this->assertTrue(is_string($request->getUrlCurrent()));
    }
    
    public function testGetFullUrlWithQuery()
    {
        $request = new Request();

        $this->assertSame('://?page=1', $request->getFullUrlWithQuery(['page' => 1]));
    }
    
    public function testBuildQuery()
    {
        $request = new Request();

        $this->assertSame('page=1', $request->buildQuery(['page' => 1]));

        $this->assertSame('page=1&orderby=title&order=asc', $request->buildQuery(['page' => 1, 'orderby' => 'title', 'order' => 'asc']));
    }
}

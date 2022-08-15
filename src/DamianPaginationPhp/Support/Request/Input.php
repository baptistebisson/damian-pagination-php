<?php

namespace DamianPaginationPhp\Support\Request;

/**
 * @author  Stephen Damian <contact@devandweb.fr>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link    https://github.com/s-damian/damian-pagination-php
 */
class Input
{
    private Request $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function hasGet(string $name): bool
    {
        return $this->request->getGet()->has($name);;
    }

    public function get(string $name)
    {
        return $this->request->getGet()->get($name);
    }
}

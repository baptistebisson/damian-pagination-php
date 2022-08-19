<?php

namespace DamianPaginationPhp\Contracts\Http\Request;

use DamianPaginationPhp\Http\Request\Bags\ParameterBag;

/**
 * @author  Stephen Damian <contact@devandweb.fr>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link    https://github.com/s-damian/damian-pagination-php
 */
interface RequestInterface
{
    public function __construct();

    public function getGet(): ParameterBag;

    public function getServer(): ParameterBag;

    public function isAjax(): bool;
}

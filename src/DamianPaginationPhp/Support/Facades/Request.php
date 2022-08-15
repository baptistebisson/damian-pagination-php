<?php

namespace DamianPaginationPhp\Support\Facades;

/**
 * Facade pour la classe Request.
 *
 * @author  Stephen Damian <contact@devandweb.fr>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link    https://github.com/s-damian/damian-pagination-php
 */
final class Request extends Facade
{
    /**
     * @var DamianPaginationPhp\Support\Request\Request
     */
    protected static $instance;

    protected static function getFacadeAccessor(): string
    {
        return 'DamianPaginationPhp\Support\Request\Request';
    }
}

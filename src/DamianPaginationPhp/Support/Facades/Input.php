<?php

namespace DamianPaginationPhp\Support\Facades;

/**
 * Facade pour la classe Input.
 *
 * @author  Stephen Damian <contact@devandweb.fr>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link    https://github.com/s-damian/damian-pagination-php
 */
final class Input extends Facade
{
    /**
     * @var \DamianPaginationPhp\Support\Request\Input
     */
    protected static $instance;

    protected static function getFacadeAccessor(): string
    {
        return 'DamianPaginationPhp\Support\Request\Input';
    }
}

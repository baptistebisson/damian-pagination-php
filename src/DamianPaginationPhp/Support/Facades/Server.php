<?php

namespace DamianPaginationPhp\Support\Facades;

/**
 * Facade pour la classe Server.
 *
 * @author  Stephen Damian <contact@devandweb.fr>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link    https://github.com/s-damian/damian-pagination-php
 * 
 * @method static string getRequestScheme()
 * @method static string getRequestUri()
 * @method static string getServerName()
 */
final class Server extends Facade
{
    /**
     * @var \DamianPaginationPhp\Support\Request\Server
     */
    protected static $instance;

    protected static function getFacadeAccessor(): string
    {
        return 'DamianPaginationPhp\Support\Request\Server';
    }
}

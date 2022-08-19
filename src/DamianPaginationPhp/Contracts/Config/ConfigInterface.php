<?php

namespace DamianPaginationPhp\Contracts\Config;

/**
 * @author  Stephen Damian <contact@devandweb.fr>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link    https://github.com/s-damian/damian-pagination-php
 */
interface ConfigInterface
{
    /**
     * @param array<string,mixed> $config
     */
    public static function set(array $config): void;

    /**
     * @return array<string,mixed>|string
     */
    public static function get(): array|string;
}

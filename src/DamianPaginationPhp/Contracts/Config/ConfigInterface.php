<?php

declare(strict_types=1);

namespace DamianPaginationPhp\Contracts\Config;

/**
 * @author  Stephen Damian <contact@damian-freelance.fr>
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
     * @return array<string,mixed>|mixed
     */
    public static function get(string $key = null): mixed;
}

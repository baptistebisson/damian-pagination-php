<?php

namespace DamianPaginationPhp\Support\Request\Bags;

/**
 * @author  Stephen Damian <contact@devandweb.fr>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link    https://github.com/s-damian/damian-pagination-php
 */
class ParameterBag
{
    /**
     * Parameter storage.
     */
    private array $parameters;

    public function __construct(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    public function all(): array
    {
        return $this->parameters;
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->parameters);
    }

    public function get(string $key, $default = ''): mixed
    {
        return $this->has($key) ? $this->parameters[$key] : $default;
    }
}

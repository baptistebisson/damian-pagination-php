<?php

declare(strict_types=1);

namespace DamianPaginationPhp\Contracts\Http\Request;

use DamianPaginationPhp\Http\Request\Bags\ParameterBag;

/**
 * @author  Stephen Damian <contact@damian-freelance.fr>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link    https://github.com/s-damian/damian-pagination-php
 */
interface RequestInterface
{
    public function __construct();

    public function getGet(): ParameterBag;

    public function getServer(): ParameterBag;

    public function isAjax(): bool;

    public function getUrlCurrent(): string;

    /**
     * @param array<string, mixed> $query
     */
    public function getFullUrlWithQuery(array $query): string;
}

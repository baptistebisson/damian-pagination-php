<?php

declare(strict_types=1);

namespace DamianPaginationPhp\Http\Request;

use DamianPaginationPhp\Support\String\Str;
use DamianPaginationPhp\Http\Request\Bags\ParameterBag;
use DamianPaginationPhp\Contracts\Http\Request\RequestInterface;

/**
 * @author  Stephen Damian <contact@damian-freelance.fr>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link    https://github.com/s-damian/damian-pagination-php
 */
class Request implements RequestInterface
{
    /**
     * @var ParameterBag - $_GET
     */
    private ParameterBag $get;

    /**
     * @var ParameterBag - $_SERVER
     */
    private ParameterBag $server;

    public function __construct()
    {
        $this->get = new ParameterBag($_GET);
        $this->server = new ParameterBag($_SERVER);
    }

    public function getGet(): ParameterBag
    {
        return $this->get;
    }

    public function getServer(): ParameterBag
    {
        return $this->server;
    }

    public function isAjax(): bool
    {
        return $this->server->has('HTTP_X_REQUESTED_WITH') && $this->server->get('HTTP_X_REQUESTED_WITH') === 'XMLHttpRequest';
    }

    /**
     * @return string - L'URL courante (sans les éventuels query params).
     */
    public function getUrlCurrent(): string
    {
        $server = new Server();

        $requestUri = $server->getRequestUri();

        if (Str::contains($requestUri, '?')) {
            $ex = explode('?', $requestUri);
            $uri = $ex[0];
        } elseif (Str::contains($requestUri, '&')) {
            $ex = explode('&', $requestUri);
            $uri = $ex[0];
        } else {
            $uri = $requestUri;
        }

        return $server->getRequestScheme().'://'.$server->getServerName().$uri;
    }

    /**
     * @param array<string, mixed> $query
     */
    public function getFullUrlWithQuery(array $query): string
    {
        $question = '?';

        return self::getUrlCurrent().$question.$this->buildQuery(array_merge(self::getGet()->all(), $query));
    }

    /**
     * @param array<string, mixed> $array
     */
    public function buildQuery(array $array): string
    {
        return http_build_query($array, '', '&', PHP_QUERY_RFC3986);
    }
}

<?php

namespace DamianPaginationPhp\Support\Request;

use DamianPaginationPhp\Support\String\Str;
use DamianPaginationPhp\Support\Request\Bags\ParameterBag;
use DamianPaginationPhp\Contracts\Support\Request\RequestInterface;

/**
 * @author  Stephen Damian <contact@devandweb.fr>
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

    public function getFullUrlWithQuery(array $query)
    {
        $question = '?';

        return self::getUrlCurrent().$question.$this->buildQuery(array_merge(self::getGet()->all(), $query));
    }

    public function buildQuery($array)
    {
        return http_build_query($array, '', '&', PHP_QUERY_RFC3986);
    }
}

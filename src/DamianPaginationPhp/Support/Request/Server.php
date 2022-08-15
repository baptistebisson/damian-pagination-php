<?php

namespace DamianPaginationPhp\Support\Request;

/**
 * @author  Stephen Damian <contact@devandweb.fr>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link    https://github.com/s-damian/damian-pagination-php
 */
class Server
{
    private Request $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function getRequestScheme(): string
    {
        return $this->request->getServer()->get('REQUEST_SCHEME');
    }
    
    public function getRequestUri(): string
    {
        return $this->request->getServer()->get('REQUEST_URI');
    }

    /**
     * @return string - Le nom du serveur hôte qui exécute le script suivant.
     */
    public function getServerName(): string
    {
        return $this->request->getServer()->get('SERVER_NAME');
    }
}

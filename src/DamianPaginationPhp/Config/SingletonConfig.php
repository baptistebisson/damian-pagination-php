<?php

declare(strict_types=1);

namespace DamianPaginationPhp\Config;

/**
 * Classe parent des classes de config.
 *
 * @author  Stephen Damian <contact@damian-freelance.fr>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link    https://github.com/s-damian/damian-pagination-php
 */
abstract class SingletonConfig
{
    /**
     * Singleton.
     */
    final public static function getInstance(): object
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * private - Car n'est pas autorisé à etre appelée de l'extérieur.
     */
    private function __construct()
    {
    }

    /**
     * private - Empêcher l'occurrence d'être cloné.
     */
    private function __clone()
    {
    }
}

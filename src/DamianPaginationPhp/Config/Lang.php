<?php

namespace DamianPaginationPhp\Config;

use DamianPaginationPhp\Exception\PaginationException;

/**
 * Pour require les fichiers qui sont dans le dossier lang des resources.
 *
 * @author  Stephen Damian <contact@devandweb.fr>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link    https://github.com/s-damian/damian-pagination-php
 */
final class Lang extends SingletonConfig
{
    protected static ?self $instance = null;

    /**
     * @var array<string, string>
     */
    private static array $require = [];

    /**
     * Pour charger fichier(s) de lang.
     *
     * @param array<mixed> $arguments
     * @return array<string,mixed>
     */
    public function __call(string $method, array $arguments): array|string
    {
        if (!isset(self::$require[$method])) {
            $path = dirname(dirname(dirname(__FILE__))).'/resources/lang/'.$this->getLang().'/'.$method.'.php';

            if (file_exists($path)) {
                self::$require[$method] = require_once $path;
            } else {
                throw new PaginationException('Lang file "'.$this->getLang().'" not found.');
            }
        }

        return self::$require[$method];
    }

    /**
     * @return string - Langue choisie dans config.
     */
    private function getLang(): string
    {
        static $lang;

        if ($lang === null) {
            $lang = Config::getInstance()->get()['lang'];
        }

        return $lang;
    }
}

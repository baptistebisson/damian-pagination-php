<?php

namespace DamianPaginationPhp\Config;

use DamianPaginationPhp\Contracts\Config\ConfigInterface;

/**
 * Pour require fichier(s) qui sont dans le dossier de config.
 *
 * @author  Stephen Damian <contact@devandweb.fr>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link    https://github.com/s-damian/damian-pagination-php
 */
final class Config extends SingletonConfig implements ConfigInterface
{
    protected static ?self $instance = null;

    private static array $config = [];

    private static array $defaultConfig = [];

    public static function set(array $config): void
    {
        // Eventuellement écraser la config par défaut avec config(s) passée(s) en paramètre.
        self::$config = array_merge(self::$defaultConfig, $config);
    }

    public static function get(string $param = null)
    {
        if (self::$defaultConfig === []) {
            self::$defaultConfig = require_once dirname(dirname(dirname(__FILE__))).'/config/config.php';
        }

        // S'il n'y a pas eu de conf modifiée (avec méthode set), il faut assigner la config par défaut à la config à retourner.
        if (self::$config === []) {
            self::$config = self::$defaultConfig;
        }

        return self::$config[$param] ?? self::$config;
    }
}

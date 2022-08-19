<?php

namespace DamianPaginationPhp\Support\String;

use DamianPaginationPhp\Http\Request\Request;

/**
 * @author  Stephen Damian <contact@devandweb.fr>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link    https://github.com/s-damian/damian-pagination-php
 */
class Str
{
    /**
     * Déterminer si une chaîne donnée contient une sous-chaîne donnée.
     *
     * @param string $haystack - Chaine dans laquelle faire la recherche.
     * @param string $needle - Ce que l'on recherche.
     */
    public static function contains(string $haystack, string $needle): bool
    {
        if ($needle !== '' && mb_strpos($haystack, $needle) !== false) {
            return true;
        }

        return false;
    }

    /**
     * @param array<string, mixed> $options
     * - $options['except'] array
     */
    public static function inputHiddenIfHasQueryString(array $options = []): string
    {
        $arrayToIgnore = $options['except'] ?? [];

        $request = new Request();

        $htmlInputs = '';
        foreach ($request->getGet()->all() as $get => $v) {
            if (!in_array($get, (array) $arrayToIgnore)) {
                if (is_array($v)) {
                    foreach ($v as $k => $oneV) {
                        $htmlInputs .= '<input type="hidden" name="'.$get.'['.$k.']" value="'.$oneV.'">';
                    }
                } else {
                    $htmlInputs .= '<input type="hidden" name="'.$get.'" value="'.$v.'">';
                }
            }
        }

        return $htmlInputs;
    }
}

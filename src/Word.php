<?php

declare(strict_types=1);

namespace cse\helpers;

/**
 * Class Word
 *
 * @package cse\helpers
 */
class Word
{
    const DEFAULT_CHARSET = 'UTF-8';

    /**
     * Convert string charset to UTF8
     *
     * @param string $string
     * @param string $charset
     * @return string
     */
    public static function stringToUtf(string $string, string $charset = 'CP1251'): string
    {
        return iconv($charset, self::DEFAULT_CHARSET, $string);
    }
}
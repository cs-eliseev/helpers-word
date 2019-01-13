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

    const INCLINATION_MAP = [2, 0, 1, 1, 1, 2];

    const DICTIONARY_MONTH_LIST = [
        '01' => 'января',
        '02' => 'февраля',
        '03' => 'марта',
        '04' => 'апреля',
        '05' => 'мая',
        '06' => 'июня',
        '07' => 'июля',
        '08' => 'августа',
        '09' => 'сентября',
        '10' => 'октября',
        '11' => 'ноября',
        '12' => 'декабря',
    ];

    /**
     * Convert string charset to UTF-8
     *
     * @param string $string
     * @param string $charset
     * @return string
     */
    public static function stringToUtf(string $string, string $charset = 'CP1251'): string
    {
        return iconv($charset, self::DEFAULT_CHARSET, $string);
    }

    /**
     * Convert date month to word (Russia dictionary)
     *
     * @param string $date
     * @param string $delimiter
     * @return string
     *
     * @example 2017-05-01 => 1 мая 2017
     */
    public static function convertDateMonthToWord(string $date, string $delimiter = ' '): string
    {
        list($year, $month, $day) = explode('-', date('Y-m-d', strtotime($date)));

        return $day . $delimiter . self::DICTIONARY_MONTH_LIST[$month] . $delimiter . $year;
    }

    /**
     * Inclination by number (Russia map)
     *
     * @param $number
     * @param array $worlds
     * @param string $prefix
     * @param array $map
     * @return string
     */
    public static function getInclinationByNumber($number, array $worlds, string $prefix = '', array $map = self::INCLINATION_MAP): string
    {
        $number = (int) $number;
        return sprintf(
            $prefix . $worlds[($number % 100 > 4 && $number % 100 < 20) ? 2 : $map[min($number % 10, 5)]],
            $number
        );
    }
}
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

    const DICTIONARY_RUS_TO_EN = [
        'а' => 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'е' => 'e',
        'ё' => 'e',
        'ж' => 'zh',
        'з' => 'z',
        'и' => 'i',
        'й' => 'y',
        'к' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'h',
        'ц' => 'ts',
        'ч' => 'ch',
        'ш' => 'sh',
        'щ' => 'sht',
        'ь' => '',
        'ы' => 'y',
        'ъ' => '',
        'э' => 'e',
        'ю' => 'yu',
        'я' => 'ya',
        'А' => 'A',
        'Б' => 'B',
        'В' => 'V',
        'Г' => 'G',
        'Д' => 'D',
        'Е' => 'E',
        'Ж' => 'Zh',
        'З' => 'Z',
        'И' => 'I',
        'Й' => 'Y',
        'К' => 'K',
        'Л' => 'L',
        'М' => 'M',
        'Н' => 'N',
        'О' => 'O',
        'П' => 'P',
        'Р' => 'R',
        'С' => 'S',
        'Т' => 'T',
        'У' => 'U',
        'Ф' => 'F',
        'Х' => 'H',
        'Ц' => 'Ts',
        'Ч' => 'Ch',
        'Ш' => 'Sh',
        'Щ' => 'Sht',
        'Ь' => '',
        'Ы' => 'Y',
        'Ъ' => '',
        'Э' => 'E',
        'Ю' => 'Yu',
        'Я' => 'Ya'
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

    /**
     * Text transliterate by dictionary (Russia dictionary)
     *
     * @param $text
     * @param array $dictionary
     * @return string
     */
    public static function transliterate($text, array $dictionary = self::DICTIONARY_RUS_TO_EN): string
    {
        return empty($text) ? '' : str_replace(array_keys($dictionary), array_values($dictionary), $text);
    }
}
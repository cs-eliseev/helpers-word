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

    const NEGATIVE_SIGN = 'минус';

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

    const DICTIONARY_NUMBER_TO_WORD = [
        -2 => 'две',
        -1 => 'одна',
        0 => 'ноль',
        1 => 'один',
        2 => 'два',
        3 => 'три',
        4 => 'четыре',
        5 => 'пять',
        6 => 'шесть',
        7 => 'семь',
        8 => 'восемь',
        9 => 'девять',
        10 => 'десять',
        11 => 'одиннадцать',
        12 => 'двенадцать',
        13 => 'тринадцать',
        14 => 'четырнадцать',
        15 => 'пятнадцать',
        16 => 'шестнадцать',
        17 => 'семнадцать',
        18 => 'восемнадцать',
        19 => 'девятнадцать',
        20 => 'двадцать',
        30 => 'тридцать',
        40 => 'сорок',
        50 => 'пятьдесят',
        60 => 'шестьдесят',
        70 => 'семьдесят',
        80 => 'восемьдесят',
        90 => 'девяносто',
        100 => 'сто',
        200 => 'двести',
        300 => 'триста',
        400 => 'четыреста',
        500 => 'пятьсот',
        600 => 'шестьсот',
        700 => 'семьсот',
        800 => 'восемьсот',
        900 => 'девятьсот'
    ];

    const DICTIONARY_PART_GROUP = [
        ['тысяча', 'тысячи', 'тысяч'],
        ['миллион', 'миллиона', 'миллионов'],
        ['миллиард', 'миллиарда', 'миллиардов'],
        ['триллион', 'триллиона', 'триллионов'],
        ['квадриллион', 'квадриллиона', 'квадриллионов'],
        ['квинтиллион', 'квинтиллиона', 'квинтиллионов'],
        ['секстиллион', 'секстиллиона', 'секстиллионов'],
        // next
    ];

    const DICTIONARY_CURRENCY = [
        ['рубль', 'рубля', 'рублей'],
        ['копейка', 'копейки', 'копеек']
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

    /**
     * Converter unsigned integer number to word (Russia dictionary)
     *
     * @param $number
     * @param int|null $groupIndex
     * @return string
     */
    public static function convertUnsignedIntNumberToWord($number, ?int $groupIndex = null): string
    {
        $result = [];

        // zero result
        $number = is_int($number) ? (int) $number : $number;
        if (empty((int) $number)) return self::DICTIONARY_NUMBER_TO_WORD[0];

        // add zero (1234 => 001234, 1 => 001)
        $number = strval($number);
        $number = str_pad($number, (int) (ceil(strlen($number) / 3) * 3), '0', STR_PAD_LEFT);

        // split 3
        $splits = array_reverse(str_split($number, 3));

        foreach ($splits as $key => $group) {

            // convert number to word
            if ($group > 0 || ($key == 0 && $group == 0)) {
                $digits = [];

                // 100
                if ($group > 99) $digits[] = floor($group / 100) * 100;

                // 99
                if ($tens = $group % 100) {
                    $ones = $group % 10;

                    $sign_key = ($key == 1 || (is_int($groupIndex) && $groupIndex == $key)) &&
                    ($tens != 11 && $tens != 12 && $ones > 0 && $ones < 3)
                        ? -1 : 1;

                    if ($tens < 20) {
                        $digits[] = $sign_key * $tens;
                    } else {

                        $digits[] = floor($tens / 10) * 10;
                        if (!empty($ones)) $digits[] = $sign_key * $ones;
                    }
                }

                // last numbers
                $last = abs(end($digits));

                // number to word
                foreach ($digits as $j => $digit) {
                    $digits[$j] = self::DICTIONARY_NUMBER_TO_WORD[$digit];
                }

                // add part group
                if (!empty($key) && array_key_exists($key-1, self::DICTIONARY_PART_GROUP)) {
                    $digits[] = self::getInclinationByNumber($last, self::DICTIONARY_PART_GROUP[$key-1]);
                }

                // add convert part number
                if (!empty($digits)) array_unshift($result, implode(' ', $digits));

                // clear vars
                unset($j, $digit, $digits, $last, $mod1, $mod2, $flag);
            }
        }
        // clear vars
        unset($group, $key, $splits, $number);

        // join array
        return implode(' ', $result);
    }

    /**
     * Converter amount to word (Russia dictionary)
     *
     * @param $amount
     * @param bool $isFractalNullView
     * @param bool $isFullView
     * @return string
     */
    public static function convertAmountToWord($amount, bool $isFractalNullView = true, $isFullView = false): string
    {
        // check sign, convert abc
        $amount = ($sign = $amount < 0) ? substr((string) $amount, 1) : (string) $amount;

        // extend amount
        preg_match('/(\d+)[.,\s]?(\d*)/', (string) $amount, $extend);
        $number = empty($extend[1]) ? 0 : $extend[1];
        $fraction = empty($extend[2]) ? 0 : $extend[2];

        // get result number
        $result = self::convertUnsignedIntNumberToWord($number)
            . self::getInclinationByNumber(
                $number,
                self::DICTIONARY_CURRENCY[0],
                ' '
            );

        // get result fraction
        if ($isFractalNullView || !empty((int) $fraction)) {
            if ($fraction[0] != 0 && $fraction < 10) $fraction .= '0';
            $result .= ' ' . ($isFullView ? self::convertUnsignedIntNumberToWord($fraction, 0) : $fraction)
                . self::getInclinationByNumber(
                    (int) $fraction,
                    self::DICTIONARY_CURRENCY[1],
                    ' '
                );
        }

        return ($sign ? self::NEGATIVE_SIGN . ' ' : '') . $result;
    }
}
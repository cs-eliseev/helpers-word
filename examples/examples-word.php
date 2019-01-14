<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use cse\helpers\Word;

// Example: convert to UTF-8
$charset = 'CP1251';
$text = mb_convert_encoding('привет', $charset);
var_dump('encode text: "' . $text . '" charset: ' .  $charset);
var_dump('decode text: "' . Word::stringToUtf($text) . '" charset: ' . Word::DEFAULT_CHARSET);
echo PHP_EOL;

// Example: date month convert
// convert month. 2019-01-01 => 01 января 2019
var_dump(Word::convertDateMonthToWord('2019-01-01'));
// delimiter. 05.05.2018 => 05/мая/2018
var_dump(Word::convertDateMonthToWord('05.05.2018', '/'));
echo PHP_EOL;

// Example: inclination
// get text. 10 => котиков
var_dump(Word::getInclinationByNumber(10, ['котик', 'котика', 'котиков']));
// get text & number. 0 => 0 котиков
var_dump(Word::getInclinationByNumber(0, ['%d котик', '%d котика', '%d котиков']));
// get push number to text. 01 => был 1 котик
var_dump(Word::getInclinationByNumber('01', ['был %d котик', 'было %d котика', 'было %d котиков']));
// get text & number by prefix. 4 => 4 котика
var_dump(Word::getInclinationByNumber('4', ['котик', 'котика', 'котиков'], '%d '));
// get text & prefix. 6 => еще больше котиков
var_dump(Word::getInclinationByNumber(6, ['котик', 'котика', 'котиков'], 'еще больше '));
echo PHP_EOL;

// Example: transliterate
// 12 пользователей online => 12 polzovateley online
var_dump(Word::transliterate('12 пользователей online'));
echo PHP_EOL;

// Example: convert number to word
// zero: 0 => 'ноль'
var_dump(Word::convertUnsignedIntNumberToWord(0));
// thousand: 1001 => 'одна тысяча один'
var_dump(Word::convertUnsignedIntNumberToWord('1001'));
// inclination: 2002 => 'две тысячи двe'
var_dump(Word::convertUnsignedIntNumberToWord(2002, 0));
echo PHP_EOL;
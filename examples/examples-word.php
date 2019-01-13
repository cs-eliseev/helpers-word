<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use cse\helpers\Word;

// Example: convert to UTF-8
$charset = 'CP1251';
$text = mb_convert_encoding('привет', $charset);
var_dump('encode text: "' . $text . '" charset: ' .  $charset);
var_dump('decode text: "' . Word::stringToUtf($text) . '" charset: ' . Word::DEFAULT_CHARSET . PHP_EOL);
echo PHP_EOL;

// Example: date month convert
// convert month. 2019-01-01 => 01 января 2019
var_dump('date converter: ' . Word::convertDateMonthToWord('2019-01-01'));
// delimiter. 05.05.2018 => 05/мая/2018
var_dump('date converter delimiter: ' . Word::convertDateMonthToWord('05.05.2018', '/'));
echo PHP_EOL;

// Example: inclination
// get text. 10 => котиков
echo 'inclination result: ' . Word::getInclinationByNumber(10, ['котик', 'котика', 'котиков']) . PHP_EOL;
// get text & number. 0 => 0 котиков
echo 'inclination result: ' . Word::getInclinationByNumber(0, ['%d котик', '%d котика', '%d котиков']) . PHP_EOL;
// get push number to text. 01 => был 1 котик
echo 'inclination result: ' . Word::getInclinationByNumber('01', ['был %d котик', 'было %d котика', 'было %d котиков']) . PHP_EOL;
// get text & number by prefix. 4 => 4 котика
echo 'inclination result: ' . Word::getInclinationByNumber('4', ['котик', 'котика', 'котиков'], '%d ') . PHP_EOL;
// get text & prefix. 6 => еще больше котиков
echo 'inclination result: ' . Word::getInclinationByNumber(6, ['котик', 'котика', 'котиков'], 'еще больше ') . PHP_EOL;
echo PHP_EOL;

// Example: transliterate
// 12 пользователей online => 12 polzovateley online
echo 'transliterate result: ' . Word::transliterate('12 пользователей online') . PHP_EOL;
echo PHP_EOL;
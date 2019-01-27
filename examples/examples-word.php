<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

use cse\helpers\Word;

// Demo example
var_dump(Word::getInclinationByNumber('21', ['котик', 'котика', 'котиков'], 'мурлычит ' . Word::convertUnsignedIntNumberToWord(21) . ' '));
echo PHP_EOL;

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
// zero: 0 => ноль
var_dump(Word::convertUnsignedIntNumberToWord(0));
// thousand: 1001 => одна тысяча один
var_dump(Word::convertUnsignedIntNumberToWord('1001'));
// inclination: 2002 => две тысячи двe
var_dump(Word::convertUnsignedIntNumberToWord(2002, 0));
echo PHP_EOL;

// Example: convert amount to word
// int & zero: 0 => ноль рублей 0 копеек
var_dump(Word::convertAmountToWord(0));
// string & thousand & cents tens: 1001.1 => одна тысяча один рубль 10 копеек
var_dump(Word::convertAmountToWord('1001.1'));
// tens & cents ones: 2012.01 => две тысячи двенадцать рублей 01 копейка
var_dump(Word::convertAmountToWord(2012.01));
// cents tens to word: 6543.2 => шесть тысяч пятьсот сорок три рубля двадцать копеек
var_dump(Word::convertAmountToWord(6543.2, true, true));
// tens thousand & cents ones to word: 87654.02 => восемьдесят семь тысяч шестьсот пятьдесят четыре рубля две копейки
var_dump(Word::convertAmountToWord(87654.02, true, true));
// millions & zero cents to word: 1098765.0 => один миллион девяносто восемь тысяч семьсот шестьдесят пять рублей ноль копеек
var_dump(Word::convertAmountToWord(1098765.0, true, true));
// ignore zero cents: 0.30 => ноль рублей тридцать копеек
var_dump(Word::convertAmountToWord('0.30', false, true));
// int & ignore zero cents: 0.30 => ноль рублей
var_dump(Word::convertAmountToWord(0.0, false, true));
// string & ignore zero cents: 0.30 => ноль рублей
var_dump(Word::convertAmountToWord('0.00', false, true));
<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use cse\helpers\Word;

// Example: convert to UTF-8
$charset = 'CP1251';
$text = mb_convert_encoding('привет', $charset);
echo 'encode text: "' . $text . '" charset: ' .  $charset . PHP_EOL;
echo 'decode text: "' . Word::stringToUtf($text) . '" charset: ' . Word::DEFAULT_CHARSET . PHP_EOL;
echo PHP_EOL;

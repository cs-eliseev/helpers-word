<?php

use cse\helpers\Word;
use PHPUnit\Framework\TestCase;

class TestWorld extends TestCase
{
    /**
     * @param string $string
     * @param string $charset
     *
     * @dataProvider providerConvertStringCarsetToUtf
     */
    public function testConvertStringCarsetToUtf(string $string, string $charset): void
    {
        $this->assertEquals(Word::stringToUtf(mb_convert_encoding($string, $charset), $charset), $string);
    }

    /**
     * @return array
     */
    public function providerConvertStringCarsetToUtf(): array
    {
        return [
            [
                'привет',
                'CP1251'
            ],
            [
                'test',
                'KOI8-R',
            ],
        ];
    }
}
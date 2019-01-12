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

    /**
     * @param string $date
     * @param string $prefix
     * @param string $expected
     *
     * @dataProvider providerConvertDateMonthToWord
     */
    public function testConvertDateMonthToWord(string $date, string $prefix, string $expected): void
    {
        $this->assertEquals(Word::convertDateMonthToWord($date, $prefix), $expected);
    }

    /**
     * @return array
     */
    public function providerConvertDateMonthToWord(): array
    {
        return [
            [
                '2019-01-01',
                ' ',
                '01 января 2019',
            ],

            [
                '05.05.2018',
                '/',
                '05/мая/2018',
            ],
        ];
    }
}
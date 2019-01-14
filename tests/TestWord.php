<?php

use cse\helpers\Word;
use PHPUnit\Framework\TestCase;

class TestWord extends TestCase
{
    /**
     * @param string $string
     * @param string $charset
     *
     * @dataProvider providerConvertStringCarsetToUtf
     */
    public function testConvertStringCarsetToUtf(string $string, string $charset): void
    {
        $this->assertEquals($string, Word::stringToUtf(mb_convert_encoding($string, $charset), $charset));
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
        $this->assertEquals($expected, Word::convertDateMonthToWord($date, $prefix));
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

    /**
     * @param $number
     * @param array $worlds
     * @param string $prefix
     * @param string $expected
     *
     * @dataProvider providerInclinationByNumber
     */
    public function testInclinationByNumber($number, array $worlds, string $prefix, string $expected): void
    {
        $this->assertEquals($expected, Word::getInclinationByNumber($number, $worlds, $prefix));
    }

    /**
     * @return array
     */
    public function providerInclinationByNumber(): array
    {
        return [
            [
                0,
                ['%d котик', '%d котика', '%d котиков'],
                '',
                '0 котиков'
            ],
            [
                '01',
                ['был %d котик', 'было %d котика', 'было %d котиков'],
                '',
                'был 1 котик'
            ],
            [
                '4',
                ['котик', 'котика', 'котиков'],
                '%d ',
                '4 котика'
            ],
            [
                10,
                ['котик', 'котика', 'котиков'],
                '',
                'котиков'
            ],
        ];
    }

    /**
     * @param $text
     * @param string $expected
     *
     * @dataProvider providerTransliterate
     */
    public function testTransliterate($text, string $expected): void
    {
        $this->assertEquals($expected, Word::transliterate($text));
    }

    /**
     * @return array
     */
    public function providerTransliterate(): array
    {
        return [
            [
                1230,
                '1230'
            ],
            [
                'тест',
                'test',
            ],
            [
                'очень длинный текст 1',
                'ochen dlinnyy tekst 1'
            ],
        ];
    }
}
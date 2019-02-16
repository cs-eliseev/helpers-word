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

    /**
     * @param $number
     * @param int|null $groupIndex
     * @param string $expected
     *
     * @dataProvider providerConvertUnsignedIntNumberToWord
     */
    public function testConvertUnsignedIntNumberToWord($number, ?int $groupIndex, string $expected): void
    {
        $this->assertEquals(Word::convertUnsignedIntNumberToWord($number, $groupIndex), $expected);
    }

    /**
     * @return array
     */
    public function providerConvertUnsignedIntNumberToWord(): array
    {
        return [
            [
                0,
                null,
                'ноль'
            ],
            [
                '2002',
                null,
                'две тысячи два'
            ],
            [
                2002,
                0,
                'две тысячи две'
            ],
            [
                987654321098765432,
                null,
                'девятьсот восемьдесят семь квадриллионов шестьсот пятьдесят четыре триллиона триста двадцать один миллиард девяносто восемь миллионов семьсот шестьдесят пять тысяч четыреста тридцать два'
            ],
            [
                '9876543210987654321',
                null,
                'девять квинтиллионов восемьсот семьдесят шесть квадриллионов пятьсот сорок три триллиона двести десять миллиардов девятьсот восемьдесят семь миллионов шестьсот пятьдесят четыре тысячи триста двадцать один'
            ],
        ];
    }

    /**
     * @param $amount
     * @param bool $isFractalNullView
     * @param bool $isFullView
     * @param string $expected
     *
     * @dataProvider providerConvertAmountToWord
     */
    public function testConvertAmountToWord($amount, bool $isFractalNullView, bool $isFullView, string $expected): void
    {
        $this->assertEquals(Word::convertAmountToWord($amount, $isFractalNullView, $isFullView), $expected);
    }

    /**
     * @return array
     */
    public function providerConvertAmountToWord(): array
    {
        return [
            [
                1231450.1,
                true,
                false,
                'один миллион двести тридцать одна тысяча четыреста пятьдесят рублей 10 копеек'
            ],
            [
                '-11672891.02',
                true,
                false,
                'минус одиннадцать миллионов шестьсот семьдесят две тысячи восемьсот девяносто один рубль 02 копейки'
            ],
            [
                -22011113.01,
                true,
                true,
                'минус двадцать два миллиона одиннадцать тысяч сто тринадцать рублей одна копейка'
            ],
            [
                '4330110210.12',
                true,
                true,
                'четыре миллиарда триста тридцать миллионов сто десять тысяч двести десять рублей двенадцать копеек'
            ],
            [
                0,
                true,
                true,
                'ноль рублей ноль копеек'
            ],
            [
                '0.00',
                true,
                true,
                'ноль рублей ноль копеек'
            ],
            [
                0,
                false,
                true,
                'ноль рублей'
            ],
            [
                '0.00',
                false,
                true,
                'ноль рублей'
            ],
        ];
    }

    /**
     * @param string $word
     * @param bool $isCamelCase
     * @param string $delimiter
     * @param string $expired
     *
     * @dataProvider providerCamelCase
     */
    public function testCamelCase(string $word, bool $isCamelCase, string $delimiter,string $expired): void
    {
        $this->assertEquals($expired, Word::camelCase($word, $isCamelCase, $delimiter));
    }

    /**
     * @return array
     */
    public function providerCamelCase(): array
    {
        return [
            [
                'test-word',
                true,
                '-',
                'TestWord',
            ],

            [
                'TestWord',
                false,
                '/',
                'test/word',
            ],

            [
                'test',
                true,
                '-',
                'Test',
            ],

            [
                'test',
                false,
                '-',
                'test',
            ],
        ];
    }
}
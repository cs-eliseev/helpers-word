[English](https://github.com/cs-eliseev/helpers-word/blob/master/README.md) | Русский

WORD CSE HELPERS
=======

[![Travis (.org)](https://img.shields.io/travis/cs-eliseev/helpers-word.svg?style=flat-square)](https://travis-ci.org/cs-eliseev/helpers-word)
[![Codecov](https://img.shields.io/codecov/c/github/cs-eliseev/helpers-word.svg?style=flat-square)](https://codecov.io/gh/cs-eliseev/helpers-word)
[![Scrutinizer code quality](https://img.shields.io/scrutinizer/g/cs-eliseev/helpers-word.svg?style=flat-square)](https://scrutinizer-ci.com/g/cs-eliseev/helpers-word/?branch=master)

[![Packagist](https://img.shields.io/packagist/v/cse/helpers-word.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-word)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-word)
[![Packagist](https://img.shields.io/packagist/l/cse/helpers-word.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-word/blob/master/LICENSE.md)
[![GitHub repo size](https://img.shields.io/github/repo-size/cs-eliseev/helpers-word.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-word/archive/master.zip)

Данная библиотек позволяет удобно работать с текстовыми данными. Доступны методы для преобразования наклонения, транслита, преобразования даты и чисел и прочее.

Репозиторий проекта: https://github.com/cs-eliseev/helpers-word

**DEMO**
```php
$number = 21;
Word::getInclinationByNumber(
    $number,
    ['котик', 'котика', 'котиков'],
    'мурлычит ' . Word::convertUnsignedIntNumberToWord($number) . ' '
);
// мурлычит двадцать один котик
```

***


## Описание проекта

CSE HELPERS - это набор из небольших библиотек с простыми функциями написанных на PHP специально для вас.

Несмотря на повсеместное использование PHP в качестве основного языка для WEB разработки, его зачастую недостаточно. WORD CSE HELPERS, позволит вам довольно просто склонять слова, преобразовывать числа и суммы, обрабатывать даты и д.р.

CSE HELPERS создан для быстрой разработки веб-приложений.

**Список библиотек CSE Helpers:**
* [Array CSE helpers](https://github.com/cs-eliseev/helpers-arrays)
* [Cookie CSE helpers](https://github.com/cs-eliseev/helpers-cookie)
* [Date CSE helpers](https://github.com/cs-eliseev/helpers-date)
* [Email CSE helpers](https://github.com/cs-eliseev/helpers-email)
* [IP CSE helpers](https://github.com/cs-eliseev/helpers-ip)
* [Json CSE helpers](https://github.com/cs-eliseev/helpers-json)
* [Math Converter CSE helpers](https://github.com/cs-eliseev/helpers-math-converter)
* [Phone CSE helpers](https://github.com/cs-eliseev/helpers-phone)
* [Request CSE helpers](https://github.com/cs-eliseev/helpers-request)
* [Session CSE helpers](https://github.com/cs-eliseev/helpers-session)
* [Word CSE helpers](https://github.com/cs-eliseev/helpers-word)

Ниже представлена информация об установке и перечне команд с примерами их использования.


## Установка

Самая последняя версия проекта доступна [здесь](https://github.com/cs-eliseev/helpers-word).

### Composer

Чтобы установить последнюю версию проекта, выполните следующую команду в терминале:
```shell
composer require cse/helpers-word
```

Или добавьте следующее содержимое в файл composer.json:
```json
{
    "require": {
        "cse/helpers-word": "*"
    }
}
```

### Git

Добавить этот репозиторий локально можно следующим образом:
```shell
git clone https://github.com/cs-eliseev/helpers-word.git
```

### Скачать

[Скачать последнюю версию проекта можно здесь](https://github.com/cs-eliseev/helpers-word/archive/master.zip).

## Использование

Данный класс использует статические методы, которые удобно использовать в любом проекте. Смотрите пример [examples-word.php](https://github.com/cs-eliseev/helpers-word/blob/master/examples/examples-word.php).


**Преобразовать в UTF-8**

Пример (CP1251):
```php
$text = mb_convert_encoding('привет', 'CP1251');
Word::stringToUtf($text);
// привет
```

Установка кодировки:
```php
$text = mb_convert_encoding('привет', 'KOI8-R');
Word::stringToUtf($text, 'KOI8-R');
// привет
```

**Преобразовать месяц из даты в текст**

Пример:
```php
Word::convertDateMonthToWord('2019-01-01');
// 01 января 2019
```

Установить разделитель:
```php
Word::convertDateMonthToWord('05.05.2018', '/');
// 05/мая/2018
```

**Наклонение слова**

Пример:
```php
Word::getInclinationByNumber(10, ['котик', 'котика', 'котиков']);
// котиков
```

Добавить число:
```php
Word::getInclinationByNumber(0, ['%d котик', '%d котика', '%d котиков']);
// 0 котиков
```

Добавить текст перед числом:
```php
Word::getInclinationByNumber('01', ['был %d котик', 'было %d котика', 'было %d котиков']);
// был 1 котик
```

Добавить префикс:
```php
   Word::getInclinationByNumber(4, ['котик', 'котика', 'котиков'], 'еще %d ');
// еще 4 котика
```

**Транслит теста**

Пример:
```php
Word::transliterate('12 пользователей online');
// 12 polzovateley online
```


**Приобразования числа в текст**

Пример:
```php
Word::convertUnsignedIntNumberToWord(0);
// ноль
Word::convertUnsignedIntNumberToWord('1001');
// одна тысяча один
```

Изменение наклонения:
```php
Word::convertUnsignedIntNumberToWord(2002, 0);
// две тысячи двe
```

**Преобразование суммы в текст**

Пример:
```php
Word::convertAmountToWord(0);
// ноль рублей 0 копеек
```

Пример с копейками:
```php
Word::convertAmountToWord('1001.1');
// одна тысяча один рубль 10 копеек
Word::convertAmountToWord(2012.01);
// две тысячи двенадцать рублей 01 копейка
```

Приобразование копеек в текст:
```php
Word::convertAmountToWord(87654.02, true, true);
// восемьдесят семь тысяч шестьсот пятьдесят четыре рубля две копейки
```

Скрывать пустые копейки:
```php
Word::convertAmountToWord('1098765.00', false);
// один миллион девяносто восемь тысяч семьсот шестьдесят пять рублей
```

**Преобразовать в CamelCase**

Пример:
```php
Word::camelCase('example-word');
// ExampleWord
```

Преобразовать из CamelCase:
```php
Word::camelCase('ExampleWord', true);
// example-word
```

Изменить разделитель:
```php
Word::camelCase('ExampleWord', true, '/');
// example/word
```


## Тестирование и покрытие кода

PHPUnit используется для модульного тестирования. Данные тесты гарантируют, что методы класса выполняют свою задачу.

Подробную документацию по PHPUnit можно найти по адресу: https://phpunit.de/documentation.html.

Чтобы запустить тесты выполните:
```bash
phpunit PATH/TO/PROJECT/tests/
```

Чтобы сформировать отчет о покрытии тестами кода, необходимо выполнить следующую команду:
```bash
phpunit --coverage-html ./report PATH/TO/PROJECT/tests/
```

Чтобы использовать настройки по умолчанию, достаточно выполнить:
```bash
phpunit --configuration PATH/TO/PROJECT/phpunit.xml
```


## Вклад в общее дело

Вы можите поддержать данный проект [здесь](https://www.paypal.me/cseliseev/10usd). 
Вы также можете помочь, внеся свой вклад в проект или сообщив об ошибках.
Даже высказывать свои предложения по функциям - это здорово. Все, что поможет, высоко ценится.


## Лицензия

CSE HELPERS WORD это PHP-библиотека с открытым исходным кодом распространяемая по лицензии MIT. Для получения более подробной информации, пожалуйста, ознакомьтесь с [лицензионным файлом](https://github.com/cs-eliseev/helpers-word/blob/master/LICENSE.md).

***

> GitHub [@cs-eliseev](https://github.com/cs-eliseev)
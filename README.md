WORD CSE HELPERS
=======

The helpers allows you to modify string data. Inclination, transliterate, convert month date and convert number or amount to word - all this is available in this library.

Project repository: https://github.com/cs-eliseev/helpers-word

***

## Introduction

CSE HELPERS is a collection of several libraries with simple functions written in PHP for people.

Despite using PHP as the main programming language for the Internet, its functions are not enough. WORD CSE HELPERS solves the problem: word inclination, word transliteration, number or sum conversion to a word, etc.

CSE HELPERS was created for the rapid development of web applications.

**CSE Helpers projec:**
* [Word CSE helpers](https://github.com/cs-eliseev/helpers-word)

Below you will find some information on how to init library and perform common commands.

## Install

You can find the most recent version of this project [here](https://github.com/cs-eliseev/helpers-word).

### Composer

Execute the following command to get the latest version of the package:
```
composer require cse/helpers-word
```

Or file composer.json should include the following contents:
```
{
    "require": {
        "cse/helpers-word": "*"
    }
}
```

### Git

Clone this repository locally:
```
git clone https://github.com/cs-eliseev/helpers-word.git
```

### Download

[Download the latest release here](https://github.com/cs-eliseev/helpers-word/archive/master.zip).

## Usage

The class consists of static methods that are conveniently used in any project. See example [examples-word.php](https://github.com/cs-eliseev/helpers-word/blob/master/examples/examples-word.php).

**Convert string to utf-8**

Example default charset(CP1251):
```php
$text = mb_convert_encoding('привет', 'CP1251');
Word::stringToUtf($text);
// привет
```

Set charset:
```php
$text = mb_convert_encoding('привет', 'KOI8-R');
Word::stringToUtf($text, 'KOI8-R');
// привет
```

**Date month to word converter**

Example:
```php
Word::convertDateMonthToWord('2019-01-01');
// 01 января 2019
```

Add delimiter to result:
```php
Word::convertDateMonthToWord('05.05.2018', '/');
// 05/мая/2018
```

**Inclination**

Example:
```php
Word::getInclinationByNumber(10, ['котик', 'котика', 'котиков']);
// котиков
```

Add number:
```php
Word::getInclinationByNumber(0, ['%d котик', '%d котика', '%d котиков']);
// 0 котиков
```

Add string number to text:
```php
Word::getInclinationByNumber('01', ['был %d котик', 'было %d котика', 'было %d котиков']);
// был 1 котик
```

Add text prefix:
```php
   Word::getInclinationByNumber(4, ['котик', 'котика', 'котиков'], 'еще %d ');
// еще 4 котика
```

**Text transliterate**

Example:
```php
Word::transliterate('12 пользователей online');
// 12 polzovateley online
```


## License

See the [LICENSE.md](https://github.com/cs-eliseev/helpers-word/blob/master/LICENSE.md) file for licensing details.
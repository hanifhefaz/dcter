# Dcter  :calendar: Dates Converter

[![Latest Stable Version](https://img.shields.io/packagist/v/hanifhefaz/dcter.svg?style=flat-square)](https://packagist.org/packages/hanifhefaz/dcter)
[![Total Downloads](https://img.shields.io/packagist/dt/hanifhefaz/dcter.svg?style=flat-square)](https://packagist.org/packages/hanifhefaz/dcter)


A composer package that is used to convert Jalali, Hijri, Gregorian and Julian dates to each others.

## :beginner: Installation

```composer require hanifhefaz/dcter``` 

## :question: Usage

This package currently consists of 6 methods to convert dates, namely, ```HijriToGregorian```, ```GregorianToHijri```, ```JulianToHijri```, ```HijriToJulian```, ```GregorianToJalali``` and ```JalaliToGregorian``` methods.

each method can be used the same way as we used the one in example, but the ```JulianToHijri``` takes the parameter in julian format, where the output will be a hijri date and the ```HijriToJulian``` takes the parameter as hijri date, and the output will be a julian format.

Please note, that the recommended way of giving input to be converted is ```YYYY-MM-DD```

1. Jalali (Hijri Shamsi) :twisted_rightwards_arrows: Gregorian

```php
<?php
use HanifHefaz\Dcter\Dcter;

$date = "1401-01-16";
    $gregorianDate = Dcter::JalaliToGregorian($date);
    return $gregorianDate; // returns 2022-4-5
```

2. Gregorian :twisted_rightwards_arrows: Jalali (Hijri Shamsi)

```php
<?php
use HanifHefaz\Dcter\Dcter;

$date = "2023-04-08";
    $jalaliDate = Dcter::GregorianToJalali($date);
    return $jalaliDate; // returns 1402-1-19
```

3. Gregorian :twisted_rightwards_arrows: Hijri (Hijri Qamari)

```php
<?php
use HanifHefaz\Dcter\Dcter;

$date = "2023-04-08";
    $hijriDate = Dcter::GregorianToHijri($date);
    return $hijriDate; // returns 1444-09-17
```

4. Hijri (Hijri Qamari) :twisted_rightwards_arrows: Gregorian

```php
<?php
use HanifHefaz\Dcter\Dcter;

$date = "1444-09-17";
    $gregorianDate = Dcter::HijriToGregorian($date);
    return $gregorianDate; // returns 2023-04-08
```

5. Hijri (Hijri Qamari) :twisted_rightwards_arrows: Julian

```php
<?php
use HanifHefaz\Dcter\Dcter;

$date = "1444-09-17";
    $julianDate = Dcter::HijriToJulian($date);
    return $julianDate; // returns 2460043
```

6. Julian :twisted_rightwards_arrows: Hijri (Hijri Qamari)

```php
<?php
use HanifHefaz\Dcter\Dcter;

$date = "2460043";
    $hijriDate = Dcter::JulianToHijri($date);
    return $hijriDate; // returns 1444-9-17
```

## :performing_arts: Contributions

Contributions are most welcome!

Please fork the repository and push your changes to your own fork. then make a PR!

## ❤️ Contributors

People who contributed to this package:

<!-- ALL-CONTRIBUTORS-LIST:START - Do not remove or modify this section -->
<!-- prettier-ignore-start -->
<!-- markdownlint-disable -->
<table>
  <tr>
    <td align="center"><a href="https://github.com/hanifhefaz/"><img src="https://avatars3.githubusercontent.com/hanifhefaz?v=4?s=100" width="100px;" alt=""/><br /><sub><b>Hanif Hefaz</b></sub></a></td>
  </tr>
</table>


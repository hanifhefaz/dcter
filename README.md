# Dcter

A package used to convert Jalali, Hijri, Gregorian and Julian dates to each others.

## Installation

```composer require hanifhefaz/dcter```

after installation, register the provider in ```app/config.php``` as ```HanifHefaz\Dcter\DcterServiceProvider::class,```

That is it!

## Usage

1. import ```use \HanifHefaz\Dcter\Dcter;```

2. use it like this:

```
 $date = "1400-01-01";
    $gregorianDate = Dcter::JalaliToGregorian($date);
    return $gregorianDate; // returns 2021-3-21
```

This package currently consists of 6 methods to convert dates, namely, ```HijriToGregorian```, ```GregorianToHijri```, ```JulianToHijri```, ```HijriToJulian```, ```GregorianToJalali``` and ```JalaliToGregorian```.

each method can be used the same way as we used the one in example, but the ```JulianToHijri``` takes the parameter as date, where the output will be a number and the ```HijriToJulian``` takes the parameter as number, and the output will be a date.

## Contributions

Contributions are most welcome!

We need the package's service provider to be registered automatically.

Please fork the repository and push your changes to your own fork. then make a PR!

Thank you!
<?php

use PHPUnit\Framework\TestCase;
use HanifHefaz\Dcter\Dcter;

class DcterTests extends TestCase
{
    public function testHijriToGregorian()
    {
        $expected = "2023-04-13";
        $actual = Dcter::HijriToGregorian("1444-09-22", "YYYY-MM-DD");
        $this->assertEquals($expected, $actual);
    }

    public function testGregorianToHijri()
    {
        $expected = "1444-09-22";
        $actual = Dcter::GregorianToHijri("2023-04-13", "YYYY-MM-DD");
        $this->assertEquals($expected, $actual);
    }

    public function testGregorianToJalali()
    {
        $expected = "1402-01-24";
        $actual = Dcter::GregorianToJalali("2023-04-13", "YYYY-MM-DD");
        $this->assertEquals($expected, $actual);
    }
    
    public function testJalaliToGregorian()
    {
        $expected = "2023-04-13";
        $actual = Dcter::JalaliToGregorian("1402-01-24", "YYYY-MM-DD");
        $this->assertEquals($expected, $actual);
    }

    public function testJulianToHijri()
    {
        $expected = "1443-12-15";
        $actual = Dcter::JulianToHijri("2459776");
        $this->assertEquals($expected, $actual);
    }

    public function testHijriToJulian()
    {
        $expected = "2459776";
        $actual = Dcter::HijriToJulian("1443-12-15", "YYYY-MM-DD");
        $this->assertEquals($expected, $actual);
    }

    public function testCarbonize()
    {
        $expected = "1443-12-15 00:00:00";
        $actual = Dcter::Carbonize("1443-12-15");
        $this->assertEquals($expected, $actual);
    }

    public function testJalaliToHijri()
    {
        $expected = "1444-09-23";
        $actual = Dcter::JalaliToHijri("1402-01-25", "YYYY-MM-DD");-
        $this->assertEquals($expected, $actual);
    }

    public function testHijriToJalali()
    {
        $expected = "1402-01-25";
        $actual = Dcter::HijriToJalali("1444-09-23", "YYYY-MM-DD");
        $this->assertEquals($expected, $actual);
    }

    
}
<?php

use PHPUnit\Framework\TestCase;
use HanifHefaz\Dcter\Dcter;

class DcterTests extends TestCase
{
    public function testHijriToGregorian()
    {
        $expected = "2023-04-12";
        $actual = Dcter::HijriToGregorian("1444-09-21", "YYYY-MM-DD");
        $this->assertEquals($expected, $actual);
    }

    public function testGregorianToHijri()
    {
        $expected = "1444-09-21";
        $actual = Dcter::GregorianToHijri("2023-04-12", "YYYY-MM-DD");
        $this->assertEquals($expected, $actual);
    }

    public function testGregorianToJalali()
    {
        $expected = "2020-06-12";
        $actual = Dcter::GregorianToJalali("1399-3-23", "YYYY-MM-DD");
        $this->assertEquals($expected, $actual);
    }
    public function testJalaliToGregorian()
    {
        $expected = "1402-01-10";
        $actual = Dcter::JalaliToGregorian("2023-3-30", "YYYY-MM-DD");
        $this->assertEquals($expected, $actual);
    }

    public function testHijriToJalali()
    {
        $expected = "1402-01-24";
        $actual = Dcter::HijriToJalali("1444-9-22", "YYYY-MM-DD");
        $this->assertEquals($expected, $actual);
    }

    
}
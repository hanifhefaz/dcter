<?php

use PHPUnit\Framework\TestCase;
use HanifHefaz\Dcter\Dcter;

class DcterTest extends TestCase
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
}
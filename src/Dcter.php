<?php

namespace HanifHefaz\Dcter;
use \Carbon\Carbon;

// With modification from https://github.com/roozbeh360
// and,
// https://github.com/rabeeaali

class Dcter
{
    public static $Day;
    public static $Month;
    public static $Year;

    // function to convert Hijri Qamari (Islamic) Year to Gregorian
    public static function HijriToGregorian($date, $format = "YYYY-MM-DD")
    {
        self::ConstructDayMonthYear($date, $format);
        $d = intval(self::$Day);
        $m = intval(self::$Month);
        $y = intval(self::$Year);

        if ($y < 1700) {

            $jd = self::intPart((11 * $y + 3) / 30) + 354 * $y + 30 * $m - self::intPart(($m - 1) / 2) + $d + 1948440 - 385;

            if ($jd > 2299160) {
                $l = $jd + 68569;
                $n = self::intPart((4 * $l) / 146097);
                $l = $l - self::intPart((146097 * $n + 3) / 4);
                $i = self::intPart((4000 * ($l + 1)) / 1461001);
                $l = $l - self::intPart((1461 * $i) / 4) + 31;
                $j = self::intPart((80 * $l) / 2447);
                $d = $l - self::intPart((2447 * $j) / 80);
                $l = self::intPart($j / 11);
                $m = $j + 2 - 12 * $l;
                $y = 100 * ($n - 49) + $i + $l;
            } else {
                $j = $jd + 1402;
                $k = self::intPart(($j - 1) / 1461);
                $l = $j - 1461 * $k;
                $n = self::intPart(($l - 1) / 365) - self::intPart($l / 1461);
                $i = $l - 365 * $n + 30;
                $j = self::intPart((80 * $i) / 2447);
                $d = $i - self::intPart((2447 * $j) / 80);
                $i = self::intPart($j / 11);
                $m = $j + 2 - 12 * $i;
                $y = 4 * $k + $n + $i - 4716;
            }

            if ($d < 10)
                $d = "0" . $d;

            if ($m < 10)
                $m = "0" . $m;
            return $y . "-" . $m . "-" . $d;
        } else
            return "";
    }

    public static function intPart($floatNum)
    {
        if ($floatNum < -0.0000001) {
            return ceil($floatNum - 0.0000001);
        }
        return floor($floatNum + 0.0000001);
    }

    // fucntion to construct day, month and year.
    public static function ConstructDayMonthYear($date, $format)
    {
        self::$Day = "";
        self::$Month = "";
        self::$Year = "";

        if($date != null) {
            $format = strtoupper($format);
            $format_Ar = str_split($format);
            $srcDate_Ar = str_split($date);
            for ($i = 0; $i < count($format_Ar); $i++) {
                if (isset($srcDate_Ar[$i])) {
                switch ($format_Ar[$i]) {
                    case "D":
                        self::$Day .= $srcDate_Ar[$i];
                        break;
                    case "M":
                        self::$Month .= $srcDate_Ar[$i];
                        break;
                    case "Y":
                        self::$Year .= $srcDate_Ar[$i];
                        break;
                }
            }
            }
        }
    }

    // fucntion to convert Gregorian date to Hijri Qamari date. 
    public static function GregorianToHijri($date, $format = "YYYY-MM-DD")
    {
        self::ConstructDayMonthYear($date, $format);
        $d = intval(self::$Day);
        $m = intval(self::$Month);
        $y = intval(self::$Year);

        if ($y > 1700) {
            if (($y > 1582) || (($y == 1582) && ($m > 10)) || (($y == 1582) && ($m == 10) && ($d > 14))) {
                $jd = self::intPart((1461 * ($y + 4800 + self::intPart(($m - 14) / 12))) / 4) + self::intPart((367 * ($m - 2 - 12 * (self::intPart(($m - 14) / 12)))) / 12) - self::intPart((3 * (self::intPart(($y + 4900 + self::intPart(($m - 14) / 12)) / 100))) / 4) + $d - 32075;
            } else {
                $jd = 367 * $y - self::intPart((7 * ($y + 5001 + self::intPart(($m - 9) / 7))) / 4) + self::intPart((275 * $m) / 9) + $d + 1729777;
            }

            $l = $jd - 1948440 + 10632;
            $n = self::intPart(($l - 1) / 10631);
            $l = $l - 10631 * $n + 354;
            $j = (self::intPart((10985 - $l) / 5316)) * (self::intPart((50 * $l) / 17719)) + (self::intPart($l / 5670)) * (self::intPart((43 * $l) / 15238));
            $l = $l - (self::intPart((30 - $j) / 15)) * (self::intPart((17719 * $j) / 50)) - (self::intPart($j / 16)) * (self::intPart((15238 * $j) / 43)) + 29;
            $m = self::intPart((24 * $l) / 709);
            $d = $l - self::intPart((709 * $m) / 24);
            $y = 30 * $n + $j - 30;

            if ($d < 10)
                $d = "0" . $d;

            if ($m < 10)
                $m = "0" . $m;  
            return $y . "-" . $m . "-" . $d;
        } else
            return "";
    }

    // Convert Julian day to Hijri Qamari date
    public static function JulianToHijri($jd)
    {
        $jd = $jd - 1948440 + 10632;
        $n  = (int)(($jd - 1) / 10631);
        $jd = $jd - 10631 * $n + 354;
        $j  = ((int)((10985 - $jd) / 5316)) *
            ((int)(50 * $jd / 17719)) +
            ((int)($jd / 5670)) *
            ((int)(43 * $jd / 15238));
        $jd = $jd - ((int)((30 - $j) / 15)) *
            ((int)((17719 * $j) / 50)) -
            ((int)($j / 16)) *
            ((int)((15238 * $j) / 43)) + 29;
        $m  = (int)(24 * $jd / 709);
        $d  = $jd - (int)(709 * $m / 24);
        $y  = 30*$n + $j - 30;

        return $y . "-" . $m . "-" . $d;
    }

    // function to convert Hijri Qamari date to Julian.
    public static function HijriToJulian($date){
    $array = explode('-', $date);
      
      $y = $array[0];
      $m = $array[1];
      $d = $array[2];
      return (int)((11 * $y + 3) / 30) + 354 * $y + 
        30 * $m - (int)(($m - 1) / 2) + $d + 1948440 - 385;
    }

    static function Division($a,$b) 
    { 
        return (int) ($a / $b); 
    } 

    // fucntion to convert Gregorian Date to Jalali Date.
    public static function GregorianToJalali ($date, $format = "YYYY-MM-DD") 
    { 
        self::ConstructDayMonthYear($date, $format);
        $g_d = intval(self::$Day);
        $g_m = intval(self::$Month);
        $g_y = intval(self::$Year);

        $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
        $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29); 
    
    
        $gy = $g_y-1600; 
        $gm = $g_m-1; 
        $gd = $g_d-1; 
        
        $g_day_no = 365*$gy+self::Division($gy+3,4)-self::Division($gy+99,100)+self::Division($gy+399,400); 
        
        for ($i=0; $i < $gm; ++$i) 
            $g_day_no += $g_days_in_month[$i]; 
        if ($gm>1 && (($gy%4==0 && $gy%100!=0) || ($gy%400==0))) 
            /* leap and after Feb */ 
            $g_day_no++; 
        $g_day_no += $gd; 
        
        $j_day_no = $g_day_no-79; 
        
        $j_np = self::Division($j_day_no, 12053); /* 12053 = 365*33 + 32/4 */ 
        $j_day_no = $j_day_no % 12053; 
        
        $jy = 979+33*$j_np+4*self::Division($j_day_no,1461); /* 1461 = 365*4 + 4/4 */ 
        
        $j_day_no %= 1461; 
        
        if ($j_day_no >= 366) { 
            $jy += self::Division($j_day_no-1, 365); 
            $j_day_no = ($j_day_no-1)%365; 
        } 
        
        for ($i = 0; $i < 11 && $j_day_no >= $j_days_in_month[$i]; ++$i) 
            $j_day_no -= $j_days_in_month[$i]; 
        $jm = $i+1;
        if($jm<10)
            $jm = "0". $jm;

        $jd = $j_day_no+1; 
        if($jd<10)
            $jd = "0". $jd;
        return $jy . "-" . $jm . "-" . $jd;
    } 

    // function to convert Jalali date to Gregorian date.
    public static function JalaliToGregorian($date, $format="YYYY-MM-DD") 
    { 
        self::ConstructDayMonthYear($date, $format);
        $j_d = intval(self::$Day);
        $j_m = intval(self::$Month);
        $j_y = intval(self::$Year);


        $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
        $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29); 
    
    
        $jy = (int)($j_y)-979; 
        $jm = (int)($j_m)-1; 
        $jd = (int)($j_d)-1; 
        
        $j_day_no = 365*$jy + self::Division($jy, 33)*8 + self::Division($jy%33+3, 4); 
        
        for ($i=0; $i < $jm; ++$i) 
            $j_day_no += $j_days_in_month[$i]; 
        
        $j_day_no += $jd; 
        
        $g_day_no = $j_day_no+79; 
        
        $gy = 1600 + 400*self::Division($g_day_no, 146097); /* 146097 = 365*400 + 400/4 - 400/100 + 400/400 */ 
        $g_day_no = $g_day_no % 146097; 
        
        $leap = true; 
        if ($g_day_no >= 36525) /* 36525 = 365*100 + 100/4 */ 
        { 
            $g_day_no--; 
            $gy += 100*self::Division($g_day_no,  36524); /* 36524 = 365*100 + 100/4 - 100/100 */ 
            $g_day_no = $g_day_no % 36524; 
        
            if ($g_day_no >= 365) 
                $g_day_no++; 
            else 
                $leap = false; 
        } 
        
        $gy += 4*self::Division($g_day_no, 1461); /* 1461 = 365*4 + 4/4 */ 
        $g_day_no %= 1461; 
        
        if ($g_day_no >= 366) { 
            $leap = false; 
        
            $g_day_no--; 
            $gy += self::Division($g_day_no, 365); 
            $g_day_no = $g_day_no % 365; 
        } 
        
        for ($i = 0; $g_day_no >= $g_days_in_month[$i] + ($i == 1 && $leap); $i++) 
            $g_day_no -= $g_days_in_month[$i] + ($i == 1 && $leap); 
        $gm = $i+1; 

        if($gm<10)
            $gm = "0". $gm;

        
        $gd = $g_day_no+1; 
        if($gd<10)
            $gd = "0". $gd;

        return $gy . "-" . $gm . "-" . $gd; 
    }

    // Make carbon date object from any converted date.

    public static function Carbonize($date)
    {
        return Carbon::parse($date);
    }

    // Function to convert Hijri to Jalali date.

    public static function HijriToJalali($date, $format = "YYYY-MM-DD")
    {
        $gregorianDate = self::HijriToGregorian($date);
        $jalali = self::GregorianToJalali($gregorianDate);
        return $jalali;
    }

    // Function to convert Jalali to Hijri date.
    
    public static function JalaliToHijri($date, $format = "YYYY-MM-DD")
    {
        $gregorianDate = self::JalaliToGregorian($date);
        $hijri = self::GregorianToHijri($gregorianDate);

        return $hijri;
    }
}
<?php

namespace HanifHefaz\Dcter\Console;

use Illuminate\Console\Command;
use HanifHefaz\Dcter\Dcter;

class ConvertDateCommand extends Command
{
    protected $signature = 'dcter:convert {date} {--from=gregorian} {--to=hijri} {--format=}';
    protected $description = 'Convert date between calendars (gregorian|hijri|jalali)';

    public function handle()
    {
        $date = $this->argument('date');
        $from = strtolower($this->option('from'));
        $to = strtolower($this->option('to'));
        $format = $this->option('format'); // optional output format token (Y-m-d style tokens supported by Dcter::formatDate)

        $result = $date;

        if ($from === 'gregorian' && $to === 'hijri') {
            $result = Dcter::GregorianToHijri($date);
        } elseif ($from === 'gregorian' && $to === 'jalali') {
            $result = Dcter::GregorianToJalali($date);
        } elseif ($from === 'hijri' && $to === 'gregorian') {
            $result = Dcter::HijriToGregorian($date);
        } elseif ($from === 'jalali' && $to === 'gregorian') {
            $result = Dcter::JalaliToGregorian($date);
        } elseif ($from === 'hijri' && $to === 'jalali') {
            $result = Dcter::HijriToJalali($date);
        } elseif ($from === 'jalali' && $to === 'hijri') {
            $result = Dcter::JalaliToHijri($date);
        } else {
            $this->error("Unsupported conversion: from={$from} to={$to}");
            return 1;
        }

        if ($format) {
            // format uses tokens for the target calendar
            $result = Dcter::formatDate($result, $to, $format);
        }

        $this->info($result);
        return 0;
    }
}

<?php

namespace HanifHefaz\Dcter\Facades;

use Illuminate\Support\Facades\Facade;

class Dcter extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'dcter';
    }
}

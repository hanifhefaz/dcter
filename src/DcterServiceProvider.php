<?php

namespace HanifHefaz\Dcter;

use Illuminate\Support\ServiceProvider;
use HanifHefaz\Dcter\DcterServiceProvider;

class DcterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->make('HanifHefaz\Dcter\Dcter');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

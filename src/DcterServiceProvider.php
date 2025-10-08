<?php

namespace HanifHefaz\Dcter;

use Illuminate\Support\ServiceProvider;

class DcterServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('dcter', function () {
            return new Dcter();
        });
    }

    public function boot()
    {
        // publish lang files
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'dcter');

        if ($this->app->runningInConsole()) {
            $this->commands([
                \HanifHefaz\Dcter\Console\ConvertDateCommand::class,
            ]);

            $this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/dcter'),
            ], 'dcter-lang');
        }
    }
}

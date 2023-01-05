<?php

namespace App\Providers;

use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        //

        $charts->register([
            \App\Charts\Test1::class
        ]);

        $charts->register([
            \App\Charts\Chart2::class
        ]);

        $charts->register([
            \App\Charts\Char3::class
        ]);

        $charts->register([
            \App\Charts\Chart4::class
        ]);

        $charts->register([
            \App\Charts\Chart5::class
        ]);
    }
}

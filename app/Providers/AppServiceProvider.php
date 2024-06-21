<?php

// app/Providers/AppServiceProvider.php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Schema::defaultStringLength(191);

        // Force HTTPS if deployed on Vercel
        if (env('VERCEL_ENV')) {
            URL::forceScheme('https');
        }
    }

    public function register()
    {
        //
    }
}


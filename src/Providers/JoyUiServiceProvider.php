<?php

namespace JoydeepBhowmik\JoyUI\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class JoyUiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::componentNamespace('App\\View\\Components', 'jui');
        Blade::anonymousComponentPath(__DIR__ . '/../resources/views/components/', 'jui');
    }
}

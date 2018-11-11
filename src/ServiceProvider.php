<?php

namespace Waygou\Helpers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        // MySQL? Load the default string length to 191 chars.
        if (config('database.connections.' . config('database.default') . '.driver') == 'mysql') {
            Schema::defaultStringLength(191);
        }
    }

    public function register()
    {
    }
}

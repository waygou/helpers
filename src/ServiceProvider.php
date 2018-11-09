<?php

namespace Waygou\Helpers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        if (config('database.' . config('database.default') . 'driver') == 'mysql') {
            Schema::defaultStringLength(191);
        }
    }

    public function register()
    {
    }
}

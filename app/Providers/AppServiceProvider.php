<?php

namespace App\Providers;

use App\Models\Config;
use Illuminate\Support\Facades\Cache;
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
    public function boot()
    {
        $settings = Cache::get('app-settings');
        if (!$settings) {
            //dd($settings);
            $settings = Config::all();
            Cache::put('app-settings', $settings);
        }

        foreach ($settings as $config) {
            config()->set($config->name, $config->value);
        }
    }
}

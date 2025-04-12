<?php

namespace App\Providers;

use App\Application\Model\Page;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Application\Model\Setting;
use Illuminate\Support\Facades\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $home_about_footer_ar_settings = Setting::where('name', 'LIKE', "%About footer-ar%")->first();
        $home_about_footer_en_settings = Setting::where('name', 'LIKE', "%About footer-en%")->first();
        Config::set(['setting' => ['home_about_footer_ar_settings' => $home_about_footer_ar_settings->body_setting,
                                'home_about_footer_en_settings' => $home_about_footer_en_settings->body_setting]]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       Schema::defaultStringLength(191);
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Xendit\Configuration;

class XenditServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Configuration::setXenditKey('xnd_development_6AFxxJiXEQTOK5912UFuvRYDDQxQQkn7PcPEVn7ovbIPGaYWAqza1WkhVTgiR');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

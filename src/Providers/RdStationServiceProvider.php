<?php

namespace MatheusHack\RdStation\Providers;

use Illuminate\Support\ServiceProvider;

/**
 *
 */
class RdStationServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom($this->getConfigPath(), 'rd_station');
    }

    /**
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            $this->getConfigPath() => config_path('rd_station.php'),
        ]);
    }

    /**
     * @return string
     */
    private function getConfigPath()
    {
        return __DIR__ . '/../../config/rd_station.php';
    }
}

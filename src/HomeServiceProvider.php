<?php

namespace Sunhill\Home;

use Illuminate\Support\ServiceProvider;

class HomeServiceProvider extends ServiceProvider
{
    public function register()
    {
    }
    
    public function boot()
    {
        $this->loadJSONTranslationsFrom(__DIR__.'/../resources/lang');
 /*       $this->loadRoutesFrom(__DIR__.'/Routes/web.php'); */
        $this->loadViewsFrom(__DIR__.'/../resources/views','home'); 
        
          if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/openhab.php' => config_path('openhab.php'),
                __DIR__.'/../config/zoneminder.php' => config_path('zoneminder.php'),            
            ], 'config');
          }
    }

}

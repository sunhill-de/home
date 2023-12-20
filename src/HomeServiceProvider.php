<?php

namespace Sunhill\Home;

use Illuminate\Support\ServiceProvider;
use Sunhill\Home\Facades\HomeManager;
use Sunhill\InfoMarket\Facades\InfoMarket;
use Sunhill\Home\Marketeers\OpenHab;
use Sunhill\Home\Marketeers\CameraMarketeer;
use Sunhill\Visual\Facades\SunhillSiteManager;

class HomeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(\Sunhill\Home\Managers\HomeManager::class, function () { return new \Sunhill\Home\Managers\HomeManager(); } );
        $this->app->alias(\Sunhill\Home\Managers\HomeManager::class,'homemanager');
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
   //       InfoMarket::installMarketeer(OpenHab::class);
   //       InfoMarket::installMarketeer(CameraMarketeer::class);
    }

}

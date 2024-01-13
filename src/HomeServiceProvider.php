<?php

namespace Sunhill\Home;

use Illuminate\Support\ServiceProvider;
use Sunhill\Home\Facades\HomeManager;
use Sunhill\InfoMarket\Facades\InfoMarket;
use Sunhill\Home\Marketeers\OpenHab;
use Sunhill\Home\Marketeers\CameraMarketeer;
use Sunhill\Visual\Facades\SunhillSiteManager;
use Sunhill\Home\Collections\ItemMap;
use Sunhill\Home\Collections\ItemGroup;
use Sunhill\Home\Collections\ItemPosition;
use Sunhill\Home\Collections\Item;
use Sunhill\ORM\Facades\Collections;

class HomeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(\Sunhill\Home\Managers\HomeManager::class, function () { return new \Sunhill\Home\Managers\HomeManager(); } );
        $this->app->alias(\Sunhill\Home\Managers\HomeManager::class,'homemanager');
    }
    
    protected function registerCollections()
    {
        Collections::registerCollection(ItemGroup::class);
        Collections::registerCollection(ItemMap::class);
        Collections::registerCollection(ItemPosition::class);
        Collections::registerCollection(Item::class);        
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
          $this->registerCollections();
   //       InfoMarket::installMarketeer(OpenHab::class);
   //       InfoMarket::installMarketeer(CameraMarketeer::class);
    }

}

<?php

namespace Sunhill\Home\Managers;

use Sunhill\Visual\Facades\SunhillSiteManager;

class HomeManager 
{
    public function addFloors()
    {
        SunhillSiteManager::addDefaultSubmodule('DG','Dachboden','Die Räume des Dachbodens',function($owner) {
            
        });            
        SunhillSiteManager::addDefaultSubmodule('OG','Obergeschoss','Die Räume des Obergeschosses',function($owner) {
                
        });
        SunhillSiteManager::addDefaultSubmodule('EG','Erdgeschoss','Die Räume des Dachbodens',function($owner) {
                
        });
        SunhillSiteManager::addDefaultSubmodule('Garten','Garten','Die Räume des Obergeschosses',function($owner) {
                    
        });
    }
    
    public function getFloors()
    {
        return [
            (new FloorItem())->setName('Dachboden')->setIcon('3')
        ];
    }
        
}
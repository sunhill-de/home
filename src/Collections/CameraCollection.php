<?php

namespace Sunhill\Home\Collections;

use Sunhill\Visual\Facades\SiteManager;
use Sunhill\Visual\Collections\CollectionBase;
use Sunhill\Home\Modules\ModuleCameras;

class CameraCollection extends CollectionBase
{
    
    /**
     * This method should be overwritten by other collections
     */
    protected function doInitCollection()
    {
        SiteManager::addMainModule('Cameras', new ModuleCameras())->setVisible();        
   }
    
}

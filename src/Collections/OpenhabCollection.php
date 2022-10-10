<?php

namespace Sunhill\Home\Collections;

use Sunhill\Visual\Modules\Database\ModuleDatabase;
use Sunhill\Visual\Facades\SiteManager;
use Sunhill\Visual\Collections\CollectionBase;
use Sunhill\Objects\Objects\Floor;
use Sunhill\Home\Response\FloorResponse;
use Sunhill\Objects\Objects\Room;
use Sunhill\Home\Response\RoomResponse;
use Illuminate\Support\Facades\Schema;

class OpenhabCollection extends CollectionBase
{
    
    protected function doInitCollection()
    {
        SiteManager::addMainModule('Computer')->setVisible();
  //      SiteManager::addSubModule('Computer','OpenHAB',new ModuleOpenHAB())->setVisible();
    }
    
}

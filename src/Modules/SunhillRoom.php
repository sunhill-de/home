<?php

namespace Sunhill\Home\Modules;

use Sunhill\Visual\Modules\SunhillModuleBase;

class SunhillRoom extends SunhillModuleBase
{
    
    protected $room;
    
    public function __construct($room)
    {
        parent::__construct();
        $this->room = $room;
    }
    
    protected function setupModule()
    {
        if (isset($this->room)) {
            $this->setName(urlencode($this->room->name));        // Name der Hauptseite
            $this->setDisplayName($this->room->name);
        }
    }
        
}

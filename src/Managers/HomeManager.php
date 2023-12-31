<?php

namespace Sunhill\Home\Managers;

use Sunhill\Visual\Facades\SunhillSiteManager;
use Sunhill\Collection\Objects\Locations\Address;
use Sunhill\ORM\Facades\Objects;
use Sunhill\Collection\Objects\Locations\Floor;
use Sunhill\Collection\Objects\Locations\Room;
use Sunhill\Home\Modules\SunhillRoom;

class HomeManager 
{
    public function getHomeLocation()
    {
        return Address::query()->where('name', 'Sonnenhügel 8')->first();
    }
    
    public function addFloors()
    {
        $location = $this->getHomeLocation();
        
        $query = Floor::query()->where('part_of', $location->id)->orderBy('level', 'desc')->get();
        foreach ($query as $floor) {
            SunhillSiteManager::addDefaultSubmodule($floor->name,$floor->name,$floor->name,function($owner) use ($floor) {
               $this->addRooms($owner, $floor);  
            });                
        } 
    }
    
    protected function addRooms($owner, $floor)
    {
        $query = Room::query()->where('part_of',$floor->id)->get();
        foreach ($query as $room) {
            $owner->addSubmodule(new SunhillRoom($room));
        }
    }
    
    public function getFloors()
    {
        return [
            (new FloorItem())->setName('Dachboden')->setIcon('3')
        ];
    }
        
}
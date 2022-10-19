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

class FloorCollection extends CollectionBase
{
    
    private function cleanStr(string $string): string
    {
        $result = str_replace(['ä','ö','ü','ß','Ä','Ö','Ü',' '],['ae','oe','ue','ss','Ae','Oe','UE','_'],$string);
        return $result;
    }
    
    /**
     * This method should be overwritten by other collections
     */
    protected function doInitCollection()
    {
        $result = Floor::search()->orderBy('level','desc')->get();
        foreach ($result as $floor) {
            $floor_response = new FloorResponse($floor);
            SiteManager::addMainModule($this->cleanStr($floor->name))
                ->setName($this->cleanStr($floor->name))
                ->setVisible()
                ->setDisplayName($this->cleanStr($floor->name))
                ->addSubEntry('index', $floor_response);

            $rooms = Room::search()->where('part_of','=',$floor)->get();
            foreach ($rooms as $room) {
                $room_response = new RoomResponse($room);
                SiteManager::addSubModule($floor->name,$this->cleanStr($room->name))
                    ->setVisible()
                    ->addSubEntry('index',$room_response);
            }
        } 
    }
    
}

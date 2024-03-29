<?php

namespace Sunhill\Home\Managers;

use Sunhill\Visual\Facades\SunhillSiteManager;
use Sunhill\Collection\Objects\Locations\Address;
use Sunhill\ORM\Facades\Objects;
use Sunhill\Collection\Objects\Locations\Floor;
use Sunhill\Collection\Objects\Locations\Room;
use Sunhill\Home\Modules\SunhillRoom;
use Illuminate\Support\Facades\Schema;
use Sunhill\Home\Controllers\FloorController;

class HomeManager 
{
    public function getHomeLocation()
    {
        if (!Schema::hasTable('addresses')) {
            return null;
        }
        return Address::query()->where('name', 'Sonnenhügel 8')->first();
    }
    
    public function addFloors()
    {
        $location = $this->getHomeLocation();
        if (is_null($location)) {
            return;
        }
        $query = Floor::query()->where('part_of', $location->id)->orderBy('level', 'desc')->get();
        foreach ($query as $floor) {
            SunhillSiteManager::addDefaultSubmodule($floor->name,$floor->name,$floor->name,function($owner) use ($floor) {
                $owner->addIndex(FloorController::class);
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
    
// **************************** OpenHAB *****************************************

    protected function launchOpenHABRequest(string $url, string $method = 'GET', string $payload = '')
    {
        $handler = curl_init(env('OPENHAB_SERVER','localhost').'/rest/'.$url);
        curl_setopt($handler, CURLOPT_PORT, env('OPENHAB_PORT',8080));
        curl_setopt($handler, CURLOPT_HTTPHEADER, ['Accept: application/json','Content-Type: text/plain']);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        switch ($method) {
            case 'POST':
                curl_setopt($handler, CURLOPT_POST, true);
                break;
            case 'PUT':
                curl_setopt($handler, CURLOPT_PUT, true);
                break;
        }
        if (!empty($payload)) {
            curl_setopt($handler, CURLOPT_POSTFIELDS, $payload);
        }
        
        if (!($result = curl_exec($handler))) {
            $result = curl_error($handler);
        }
        curl_close($handler);
        
        return $result;
    }
    
    public function getOpenHABItem(string $name)
    {
        $result = $this->launchOpenHABRequest('items/'.$name);
        
        return $result;
    }
    
    public function setOpenHABItem(string $name, $value)
    {
        $result = $this->launchOpenHABRequest('items/'.$name,'POST',$value);
        
        return $result;
    }
    
    public function getAllOpenHABItems()
    {
        $result = $this->launchOpenHABRequest('items?recursive=false');
        
        return $result;
    }
}
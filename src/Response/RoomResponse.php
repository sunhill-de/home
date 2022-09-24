<?php

namespace Sunhill\Home\Response;

use Sunhill\Visual\Response\BladeResponse;
use Sunhill\Objects\Objects\Room;

class RoomResponse extends BladeResponse
{
    
    protected $template = 'home::room.index';
    
    protected $room;
    
    public function __construct(Room $room)
    {
        $this->room = $room;
    }
    
    protected function prepareResponse()
    {
        $this->params['name'] = $this->room->name;
        $this->params['display_name'] = $this->room->name;
    }
    
}
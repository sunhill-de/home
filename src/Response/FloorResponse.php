<?php

namespace Sunhill\Home\Response;

use Sunhill\Visual\Response\BladeResponse;
use Sunhill\Objects\Objects\Floor;

class FloorResponse extends BladeResponse
{
    
    protected $template = 'home::floor.index';
    
    protected $floor;
    
    public function __construct(Floor $floor)
    {
        $this->floor = $floor;
    }
    
    protected function prepareResponse()
    {
        $this->params['name'] = $this->floor->name;
        $this->params['display_name'] = $this->floor->name;
    }
    
}
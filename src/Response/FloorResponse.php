<?php

namespace Sunhill\Home\Response;

use Sunhill\Visual\Response\SunhillBladeResponse;

class FloorResponse extends SunhillBladeResponse
{
    
    protected $template = 'home::floor.index';
    
    protected $floor;
    
    public function __construct(string $floor)
    {
        $this->floor = $floor;
    }
    
    protected function prepareResponse()
    {
        parent::prepareResponse();
        $this->params['display_name'] = 'Floor';
        $this->params['name'] = $this->floor;
    }
    
    protected function getResponse()
    {
        return view('home::floor.index', $this->params);
    }
    
}
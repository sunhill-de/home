<?php

namespace Sunhill\Home\Response\Camera;

use Sunhill\Visual\Response\BladeResponse;
use Sunhill\InfoMarket\Facades\InfoMarket;

class CameraResponse extends BladeResponse
{
            
    protected function makeLink($monitor)
    {
        return "http://192.168.3.11/zm/cgi-bin/nph-zms?scale=0&mode=jpeg&maxfps=30&monitor=$monitor";
    }   
    
    protected function prepareResponse()
    {
        $count = json_decode(InfoMarket::readItem('cameras.count'))->value;
        $list = [];
        for ($i=0;$i<$count;$i++) {
           $camera = new \StdClass();
           $camera->name = json_decode(InfoMarket::readItem("cameras.$i.name"))->value;
           $camera->link_small = $this->makeLink(json_decode(InfoMarket::readItem("cameras.$i.monitor_small"))->value);
           $camera->link_large = $this->makeLink(json_decode(InfoMarket::readItem("cameras.$i.monitor_large"))->value);
           $list[] = $camera;
        }
        $this->params['cameras'] = $list;
    }
    
}
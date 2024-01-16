<?php

namespace Sunhill\Home\Response;

use Sunhill\Visual\Response\SunhillBladeResponse;
use Sunhill\Home\Collections\ItemMap;
use Sunhill\Home\Collections\ItemPosition;
use Sunhill\Home\Collections\Item;
use Sunhill\ORM\Facades\Collections;

class MapResponse extends SunhillBladeResponse
{
    
    protected $template = 'home::map.map';
    
    protected $floor;
    
    public function __construct(string $floor)
    {
        $this->floor = $floor;
    }
    
    protected function prepareResponse()
    {
        parent::prepareResponse();
        $map = ItemMap::query()->where('name', $this->floor)->first();
        if (empty($map)) {
            throw new \Exception("Map '".$this->floor."' not found.");
        }
        $item_locations = ItemPosition::query()->where('item_map', $map->id)->get();
        $items = [];
        $relocate = '[';
        $update = '[';
        $first = true;
        foreach ($item_locations as $location_obj) {
            $item = Collections::loadCollection('Item', $location_obj->item);
            $entry = new \StdClass();
            $entry->id = $item->infomarket_item;
            $items[] = $entry;
            if ($first) {
                $first = false;
            } else {
                $relocate .= ',';
                $update .= ',';
            }
            $relocate .= '{item: "'.$item->infomarket_item.'", x: '.$location_obj->X.',y: '.$location_obj->Y.'}';
            $update .= '{item: "'.$item->infomarket_item.'", type: "'.$item->type.'"}';
        }
        $relocate .= ']';
        $update .= ']';
        $this->params['items'] = $items;
        $this->params['relocate'] = $relocate;
        $this->params['update'] = $update;
        $this->params['map_name'] = $map->background_image;
        $this->params['display_name'] = $map->name;
    }
        
}
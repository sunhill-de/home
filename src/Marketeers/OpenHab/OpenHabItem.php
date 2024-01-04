<?php

namespace Sunhill\Home\Marketeers\OpenHab;

use Sunhill\ORM\InfoMarket\Items\PreloadedObjectItem;
use Sunhill\ORM\InfoMarket\Items\DynamicItem;

class OpenHabItem extends PreloadedObjectItem
{
    
    protected $item_info;
    
    public function __construct($iteminfo)
    {
        parent::__construct();
        $this->item_info = $iteminfo;
    }
    
    protected function loadItems(): array
    {
        $result = [];
        
        $result['name'] = (new DynamicItem())->defineValue($this->item_info['name'])->type('string')->semantic('Name');
        $result['label'] = (new DynamicItem())->defineValue($this->item_info['label'])->type('string')->semantic('Name');
        switch ($this->item_info['type']) {
            case 'Number:Temperature':
                list($value) = explode(' ', $this->item_info['state']);
                if ($value > 100) {
                    // This is a LCN Coded Temperature
                    $value = ($value/10)-100;
                }
                $result['value'] = (new DynamicItem())->defineValue($value)->type('float')->semantic('Temperature')->unit('Degreecelsius');
                break;
            default:    
                $result['value'] = (new DynamicItem())->defineValue($this->item_info['state'])->type('string')->semantic('Name');
                break;
        }
        return $result;
    }
    
}

<?php
/**
 * @file OpenHab.php
 * Provides information about the OpenHab Items
 * Lang en
 * Reviewstatus: 2022-09-20
 * Localization: none
 * Documentation: complete
 * Tests:
 * Coverage: unknown
 * Dependencies: none
 * PSR-State: complete
 */

namespace Sunhill\Home\Marketeers;

use Sunhill\InfoMarket\Market\Marketeer;
use Sunhill\InfoMarket\Response\Response;
use Illuminate\Support\Facades\Config;

class OpenHab extends Marketeer
{
    
    protected $cached_items;
    
    /**
     * Returns what items this marketeer offers
     * @return array
     */
    protected function getOffering(): array
    {
        return [
            'openhab.items'=>OpenHabItems::class,
        ];
    }
    
    private function getServer()
    {
        return Config::get('openhab.Protocol').
        '://'.
        Config::get('openhab.IP').
        ':'.
        Config::get('openhab.Port');        
    }
    
    protected function fillItemCache()
    {
        $this->cached_items = [];
        $connection = curl_init($this->getServer().'/rest/items/');
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
        $this->cached_items = json_decode(curl_exec($connection));
    }
    
    protected function get_ItemCount()
    {
        if (is_null($this->cached_items)) {
            $this->fillItemCache();
        }
        $response = new Response();
        return $response->OK()->unit(' ')->type('Integer')->value(count($this->cached_items))->semantic('number')->update('late');
    }
    
    protected function solve_Item()
    {
        $result = [];
        foreach ($this->cached_items as $item) {
            $result['openhab.items.'.$item->name] = 'Item';
        }
        return $result;        
    }
 
    protected function get_Item($name)
    {
        $connection = curl_init($this->getServer().'/rest/items/'.$name);
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
        $item = json_decode(curl_exec($connection));
        $response = new Response();
        return $response->OK()->type($this->getType($item))->unit($this->getUnit($item))->semantic($this->getSemantic($item))->update('asap')->value($this->getValue($item));
    }
        
    private function getUnit($test)
    {
        switch ($test->type) {
            case 'Number:Temperature': return 'C';
            default: return ' ';
        }        
    }
    
    private function getType($test)
    {
        switch ($test->type) {
            case 'Number:Temperature': return 'Float';
            case 'Switch': return 'Boolean';
            default: return 'String';
        }
    }
    
    private function getSemantic($test)
    {
        switch ($test->type) {
            case 'Number:Temperature': return 'air_temp';
            case 'Switch': return 'switch';
            default: return 'name';
        }        
    }
    
    private function getValue($test)
    {
        switch ($test->type) {
            case 'Number:Temperature': 
                $parts = explode(' ',$test->state);
                return round($parts[0]/10-100,1);
            default: return $test->state;    
        }        
    }
}

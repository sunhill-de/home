<?php
/**
 * @file CameraMarketeer.php
 * Provides information about the installed cameras
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

class CameraMarketeer extends Marketeer
{

    protected function getOffering(): array
    {
         return [
            'cameras.count'=>'CameraCount',
            'cameras.#.name'=>'CameraName',
            'cameras.#.monitor_large'=>'CameraMonitorLarge',
            'cameras.#.monitor_small'=>'CameraMonitorSmall',
        ];
    }
    
    protected function solve_CameraName()
    {
        $result = [];
        for ($i=0;$i<3;$i++) {
            $result['cameras.'.$i.'.name'] = 'CameraName';
        }
        return $result;
    }
    
    protected function solve_CameraMonitorLarge()
    {
        $result = [];
        for ($i=0;$i<3;$i++) {
            $result['cameras.'.$i.'.monitor_large'] = 'CameraMonitorLarge';
        }
        return $result;
    }
    
    protected function solve_CameraMonitorSmall()
    {
        $result = [];
        for ($i=0;$i<3;$i++) {
            $result['cameras.'.$i.'.monitor_small'] = 'CameraMonitorSmall';
        }
        return $result;
    }
    
    protected function get_CameraCount()
    {
        $response = new Response();
        return $response->OK()->unit(' ')->type('Integer')->value(3)->semantic('number')->update('late');
    }
    
    protected function get_CameraName(int $index)
    {
        switch ($index) {
            case 0: $value = 'Haustür'; break;
            case 1: $value = 'Kämmerchen'; break;
            case 2: $value = 'Hasenstall'; break;
        }
        $response = new Response();
        return $response->OK()->unit(' ')->type('String')->value($value)->semantic('name')->update('late');        
    }
    
    protected function get_CameraMonitorSmall(int $index)
    {
        switch ($index) {
            case 0: $value = 5; break;
            case 1: $value = 3; break;
            case 2: $value = 2; break;
        }
        $response = new Response();
        return $response->OK()->unit(' ')->type('String')->value($value)->semantic('name')->update('late');        
    }
    
    protected function get_CameraMonitorLarge(int $index)
    {
        switch ($index) {
            case 0: $value = 1; break;
            case 1: $value = 2; break;
            case 2: $value = 3; break;
        }
        $response = new Response();
        return $response->OK()->unit(' ')->type('String')->value($value)->semantic('name')->update('late');
    }
    
}

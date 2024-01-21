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

namespace Sunhill\Home\Marketeers\OpenHab;

use Sunhill\InfoMarket\Market\Marketeer;
use Sunhill\InfoMarket\Response\Response;
use Illuminate\Support\Facades\Config;
use Sunhill\ORM\InfoMarket\OnDemandMarketeer;
use Sunhill\Home\Facades\HomeManager;
use Sunhill\ORM\InfoMarket\Items\DynamicItem;

class OpenHab extends OnDemandMarketeer
{
 
    protected $cache_philosophy = 'group';
    
    protected function initializeMarketeer()
    {
        $all_items = json_decode(HomeManager::getAllOpenHABItems(), true);
        if (!$all_items) {
            return;
        }
        $this->addEntry('count',(new DynamicItem())->defineValue(count($all_items))->type('int')->semantic('Count'));
        foreach ($all_items as $item) {
            $this->addEntry($item['name'],new OpenHabItem($item));            
        }
    }
        
}

<?php

/**
 * @file Item.php
 * Provides informations about an item
 * Lang en
 * Reviewstatus: 2024-01-13
 * Localization: complete
 * Documentation: unknown
 * Tests: unknown
 * Coverage: unknown
 * Dependencies: ORMObject
 */
namespace Sunhill\Home\Collections;

use Sunhill\ORM\Objects\Collection;
use Sunhill\ORM\Objects\PropertyList;
use Sunhill\ORM\Properties\PropertyVarchar;

/**
 * The class for item maps
 *
 * @author lokal
 *        
 */
class Item extends Collection
{
    
    protected static function setupProperties(PropertyList $list)
    {
        $list->varchar('name')
            ->setMaxLen(100)
            ->set_description('The name of the item group')
            ->set_displayable(true)
            ->set_editable(true)
            ->set_groupeditable(false)
            ->searchable()
            ->set_sortable(true);
        $list->collection('item_group')
            ->setAllowedCollection('ItemGroup')
            ->set_description('The name of the item group')
            ->set_displayable(true)
            ->set_editable(true)
            ->set_groupeditable(false)
            ->searchable()
            ->set_sortable(true);
        $list->varchar('infomarket_item')
            ->setMaxLen(100)
            ->set_description('The name of the infomarket item')
            ->set_displayable(true)
            ->set_editable(true)
            ->set_groupeditable(false)
            ->searchable()
            ->set_sortable(true);
        $list->enum('type',['display','temperature','light','switch','rollershutter'])
            ->set_description('What kind of element is this')
            ->set_displayable(true)
            ->set_editable(true)
            ->set_groupeditable(false)
            ->searchable()
            ->set_sortable(true);
    }
    
    protected static function setupInfos()
    {
        static::addInfo('name','Item');
        static::addInfo('table','items');
        static::addInfo('name_s','item',true);
        static::addInfo('name_p','items',true);
        static::addInfo('description','A class for items', true);
        static::addInfo('options',0);
        static::addInfo('editable',true);
        static::addInfo('instantiable',true);

        static::addInfo('table_columns',['name','group'=>'item_group->name']);
        static::addInfo('keyfield',':name');
        
    }
        
}

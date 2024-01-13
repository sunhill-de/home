<?php

/**
 * @file ItemPosition.php
 * Provides informations about the position of an item in a map
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
class ItemPosition extends Collection
{
    
    protected static function setupProperties(PropertyList $list)
    {
        $list->collection('item')
             ->setAllowedCollection('Item')
             ->set_description('The associated item')
             ->set_displayable(true)
             ->set_editable(true)
             ->set_groupeditable(false)
             ->searchable()
             ->set_sortable(true);
        $list->collection('item_map')
            ->setAllowedCollection('ItemMap')
            ->set_description('The name of the item map')
            ->set_displayable(true)
            ->set_editable(true)
            ->set_groupeditable(false)
            ->searchable()
            ->set_sortable(true);
        $list->integer('X')
            ->set_description('The x-coordinate of the item in this map')
            ->set_displayable(true)
            ->set_editable(true)
            ->set_groupeditable(false)
            ->searchable()
            ->set_sortable(true);
        $list->integer('Y')
            ->set_description('The y-coordinate of the item in this map')
            ->set_displayable(true)
            ->set_editable(true)
            ->set_groupeditable(false)
            ->searchable()
            ->set_sortable(true);
    }
    
    protected static function setupInfos()
    {
        static::addInfo('name','ItemPosition');
        static::addInfo('table','itempositions');
        static::addInfo('name_s','item position',true);
        static::addInfo('name_p','item positions',true);
        static::addInfo('description','A class for item positions', true);
        static::addInfo('options',0);
        static::addInfo('editable',true);
        static::addInfo('instantiable',true);

        static::addInfo('table_columns',['item'=>'item->name','map'=>'item_map->name']);
        static::addInfo('keyfield',':item->keyfield :map->name');
        
    }
        
}

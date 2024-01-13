<?php

/**
 * @file ItemMap.php
 * Provides informations about an item map
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
class ItemMap extends Collection
{
    
    protected static function setupProperties(PropertyList $list)
    {
        $list->varchar('name')
            ->setMaxLen(100)
            ->set_description('The name of the item map')
            ->set_displayable(true)
            ->set_editable(true)
            ->set_groupeditable(false)
            ->searchable()
            ->set_sortable(true);
        $list->varchar('background_image')
            ->setMaxLen(50)
            ->set_description('The name of the background image')
            ->searchable()
            ->set_editable(true)
            ->set_groupeditable(false)
            ->set_displayable(true)
            ->set_sortable(true);
    }
    
    protected static function setupInfos()
    {
        static::addInfo('name','ItemMap');
        static::addInfo('table','itemmaps');
        static::addInfo('name_s','item map',true);
        static::addInfo('name_p','item maps',true);
        static::addInfo('description','A class for item maps', true);
        static::addInfo('options',0);
        static::addInfo('editable',true);
        static::addInfo('instantiable',true);

        static::addInfo('table_columns',['name']);
        static::addInfo('keyfield',':name');
        
    }
        
}

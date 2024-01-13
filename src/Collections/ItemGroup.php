<?php

/**
 * @file ItemGroup.php
 * Provides informations about an item group
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
class ItemGroup extends Collection
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
    }
    
    protected static function setupInfos()
    {
        static::addInfo('name','ItemGroup');
        static::addInfo('table','itemgroups');
        static::addInfo('name_s','item group',true);
        static::addInfo('name_p','item groups',true);
        static::addInfo('description','A class for item groups', true);
        static::addInfo('options',0);
        static::addInfo('editable',true);
        static::addInfo('instantiable',true);

        static::addInfo('table_columns',['name']);
        static::addInfo('keyfield',':name');
        
    }
        
}

<?php

namespace Sunhill\Home\Items;

/**
 * Abstract class for switches (items that can bei either "on" or "off"
 */
class OpenHABSwitch extends SwitchItem
{
    protected $item_name = '';
  
    public function __construct(string $item_name)
    {
        $this->item_name = $item_name;
    }
  
    /**
     * sets the switch state to the given value
     * @param $on bool: The wanted state
     */
    protected doSwitchTo(bool $on) 
    {
    }  
    
    /**
     * get return the current state
     * @return bool: The current state
     */
    protected doGetState(): bool
    {
    }

} 

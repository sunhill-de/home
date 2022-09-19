<?php

namespace Sunhill\Home\Items;

/**
 * Abstract class for switches (items that can bei either "on" or "off"
 */
abstract class SwitchItem extends ItemBase
{
    /**
     * Abstract method that set the switch state to the given value
     * @param $on bool: The wanted state
     */
    abstract protected doSwitchTo(bool $on);
    
    /**
     * Abstract method get return the current state
     * @return bool: The current state
     */
    abstract protected doGetState(): bool;
    
    public function switchOn()
    {
        $this->doSwitchTo(true);
    }
    
    public function switchOff()
    {
        $this->doSwitchTo(false);
    }
    
    public function toggleSwitch()
    {
        $this->doSwitchTo(!$this->doGetState());
    }
    
    public function isOn(): bool
    {
        return $this->doGetState() == true;
    }
    
    public function ifOff(): bool
    {
        return $this->doGetState() == false;
    }
    
    public function getSwitchState(): bool
    {
        return $this->doGetState();
    }
    
}

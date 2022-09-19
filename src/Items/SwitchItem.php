<?php

namespace Sunhill\Home\Items;

/**
 * Abstract class for switches (items that can bei either "on" or "off"
 */
class SwitchItem extends ItemBase
{
    /**
     * sets the switch state to the given value
     * @param $on bool: The wanted state
     */
    protected doSwitchTo(bool $on)
    {
        $this->interface->setSwitch($this->item_name,$on);
    }    
    
    /**
     * return the current state of a switch
     * @return bool: The current state
     */
    protected doGetState(): bool
    {
        return $this->interface->getSwitch($this->item_name);
    }    
    
    /**
     * Switches on
     */
    public function switchOn()
    {
        $this->doSwitchTo(true);
    }
    
    /**
     * Switches off
     */
    public function switchOff()
    {
        $this->doSwitchTo(false);
    }
    
    /**
     * If the switch is on turn it off and vice versa
     */
    public function toggleSwitch()
    {
        $this->doSwitchTo(!$this->doGetState());
    }
    
    /**
     * Returns true, if the switch is on
     */
    public function isOn(): bool
    {
        return $this->doGetState() == true;
    }
    
    /**
     * Returns true, if the switch is off
     */
    public function ifOff(): bool
    {
        return $this->doGetState() == false;
    }
    
    /**
     * Returns true if the switch is on otherwise false
     * @return bool
     */
    public function getSwitchState(): bool
    {
        return $this->doGetState();
    }
    
}

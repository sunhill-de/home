<?php

namespace Sunhill\Home\Items;

/**
 * Abstract class for switches (items that can bei either "on" or "off"
 */
abstract class SwitchItem extends ItemBase
{
    /**
     * Abstract method that sets the switch state to the given value
     * @param $on bool: The wanted state
     */
    abstract protected doSwitchTo(bool $on);
    
    /**
     * Abstract method get return the current state
     * @return bool: The current state
     */
    abstract protected doGetState(): bool;
    
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

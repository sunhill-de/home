<?php

namespace Sunhill\Home\Interfaces;

/**
 * Base class for interfaces (e.g. OpenHAB)
 */
abstract class InterfaceBase 
{
      
      protected function prepareCommand(string $name)
      {  
      }
  
      protected function sendCommand(string $name, string $command, $options = null)
      {
      }

      public function getSwitch(string $name): bool
      {
          $this->prepareCommand($name);
          return $this->sendCommand($name,'getLight');          
      }
  
      public function setSwitch(string $name, bool $on)
      {
          $this->prepareCommand($name);
          return $this->sendCommand($name,'getLight',$on);          
      }  

}  

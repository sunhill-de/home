<?php

namespace Sunhill\Home\Interfaces;

class OpenHABInterface extends InterfaceBase
{
  
      protected $connection;
  
      protected function getOpenHABURL()
      {
          return "192.168.3.3:8080";
      }
  
      protected function getConnection(string $name)
      {
          $this->connection = curl_init($this->getOpenHABURL()."/rest/items/".$name);         
      }

      protected function prepareCommand(string $name)
      {  
          $this->getConnection($name);
      }
  
      protected function sendCommand(string $name, $options = null)
      {
          curl_setopt($this->connection, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($connection, CURLOPT_HTTPHEADER, ['Content-Type: text/plain','Accept: application/json']);
          if (!is_null($options)) {
              curl_setopt($connection, CURLOPT_POST, 1);
              curl_setopt($connection, CURLOPT_POSTFIELDS, $options);          
          }
          return json_decode(curl_exec($this->connection));
      }
  
}

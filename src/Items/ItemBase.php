<?php

namespace Sunhill\Home\Items;

class ItemBase
{
    protected $interface;
  
    public function __construct($interface)
    {
        $this->interface = $interface;
    }

}  

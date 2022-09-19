<?php

namespace Sunhill\Home\Items;

class ItemBase
{
    protected $interface;
  
    protected $item_name;
    
    public function __construct(string $item_name, $interface)
    {
        $this->item_name = $item_name;
        $this->interface = $interface;
    }

}  

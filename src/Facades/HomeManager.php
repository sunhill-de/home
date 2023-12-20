<?php

namespace Sunhill\Home\Facades;

use Illuminate\Support\Facades\Facade;

class HomeManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'homemanager';
    }
}

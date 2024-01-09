<?php

namespace Sunhill\Home\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Blade;
use Sunhill\Visual\Facades\Dialogs;
use Sunhill\Visual\Test\TestDialogResponse;
use Illuminate\Http\Request;
use Sunhill\Home\Response\FloorResponse;

class FloorController extends Controller
{
    
    public function index(Request $request)
    {
        $floor = substr($request->getRequestUri(),1);
        $response = new FloorResponse($floor);
        return $response->response();
    }
    
}

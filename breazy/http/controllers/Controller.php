<?php

namespace App\Http\Controllers;

use App\Core\Template_Engine\BreazyInit;
use App\Core\Common\SysPathsHolder;

abstract class Controller
{
    protected function view(string $view_name, array $args = null) : string {
        require_once(SysPathsHolder::COMMON_PATH() . "/SysPathsHolder.php");
        require_once(SysPathsHolder::TEMPLATE_ENGINE_PATH() . "/BreazyInit.php");
        return (new BreazyInit())->parse($view_name, $args);
    }

    protected function redirect($url){
        header( "Location: $url" ) ;
    }
}
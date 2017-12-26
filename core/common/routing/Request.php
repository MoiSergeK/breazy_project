<?php

namespace App\Core\Common\Routing;


trait Request
{
    public static function redirect($url){
        header( "Location: $url" ) ;
    }
}
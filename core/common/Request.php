<?php

namespace App\Core\Common;


trait Request
{
    public static function redirect($url){
        header( "Location: $url" ) ;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: igor-togo
 * Date: 08.09.2017
 * Time: 23:30
 */

namespace App\Core\Common;


trait Request
{
    public static function redirect($url){
        header( "Location: $url" ) ;
    }
}
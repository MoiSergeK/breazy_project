<?php
/**
 * Created by PhpStorm.
 * User: igor-togo
 * Date: 01.11.2017
 * Time: 23:56
 */

namespace App\Core\Common;


class Logger
{
    public static function push($msg){
        self::pushToLocalFile($msg);
    }

    public static function pushToLocalFile($msg){
        $path = (new ConfigManager())->log['local'];
        $date = date('Y:m:d:H:m:s');
        file_put_contents($path, $date . " : " . $msg . "\n");
    }

    public static function pushToDb($msg){
        $path = (new ConfigManager())->log['local'];
    }

    public static function pushToJSConsole($msg){
        echo "<script type='text/javascript'>console.log($msg)</script>";
    }
}
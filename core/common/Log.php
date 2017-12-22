<?php
/**
 * Created by PhpStorm.
 * User: igor-togo
 * Date: 01.11.2017
 * Time: 23:56
 */

namespace App\Core\Common;


class Log
{
    public static function push($msg){
        self::pushToLocalFile($msg);
    }

    public static function pushToLocalFile($msg){
        $path = (new ConfigManager())->log()['local'];
        echo $path;
        $date = date('Y/m/d H:m:s');
        $f = fopen($path, 'a');
        fwrite($f, $date . " : " . $msg . "\n");
        fclose($f);
    }

    public static function pushToDb($msg){
        $path = (new ConfigManager())->log['local'];
    }

    public static function pushToJSConsole($msg){
        echo "<script type='text/javascript'>console.log($msg)</script>";
    }
}
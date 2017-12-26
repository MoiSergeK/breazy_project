<?php

namespace App\Core\Common\Log;
use App\Core\Common\Config\LogConfig;

class Log
{
    public static function push(){
        self::pushToLocalFile(func_get_args());
    }

    public static function pushToLocalFile($msgs){
        $path = LogConfig::getLocalLog();
        $date = date('Y/m/d H:m:s');
        $f = fopen($path, 'a');
        foreach($msgs as $msg) {
            fwrite($f, $date . " : " . $msg . "\n");
        }
        fclose($f);
    }

    public static function pushToDb($msg){
        $path = LogConfig::getDBLog();
    }

    public static function pushToJSConsole(){
        $args = "'" . join("','", func_get_args()) . "'";
        echo "<script type='text/javascript'>console.log($args)</script>";
    }
}
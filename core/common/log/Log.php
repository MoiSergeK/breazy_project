<?php

namespace App\Core\Common\Log;

use App\Core\Common\Config\ConfigManager;

class Log
{
    public static function push(){
        self::pushToLocalFile(func_get_args());
    }

    public static function pushToLocalFile($msgs){
        $path = (new ConfigManager())->log()['local'];
        $date = date('Y/m/d H:m:s');
        $f = fopen($path, 'a');
        foreach($msgs as $msg) {
            fwrite($f, $date . " : " . $msg . "\n");
        }
        fclose($f);
    }

    public static function pushToDb($msg){
        $path = (new ConfigManager())->log['local'];
    }

    public static function pushToJSConsole(){
        $args = "'" . join("','", func_get_args()) . "'";
        echo "<script type='text/javascript'>console.log($args)</script>";
    }
}
<?php

namespace App\Core\Common\Config;


class CommonConfig
{
    private static $_data;

    public static function set($data) {
        self::$_data = $data;
    }

    public static function get($key) {
        return isset(self::$_data[$key]) ? self::$_data[$key] :  false;
    }
}
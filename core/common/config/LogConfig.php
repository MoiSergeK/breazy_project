<?php

namespace App\Core\Common\Config;


class LogConfig
{
    private static $_local;
    private static $_db;

    public static function setLocalLog($path){
        self::$_local = $path;
    }

    public static function getLocalLog(){
        return self::$_local;
    }

    public static function setDBLog($dbms, $dbName, $tableName){
        self::$_db = ['db' => DBConfig::getConnection($dbms, $dbName), 'table' => $tableName];
    }

    public static function getDBLog(){
        return self::$_db;
    }
}
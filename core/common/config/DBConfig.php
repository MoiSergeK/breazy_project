<?php

namespace App\Core\Common\Config;


use App\Core\Common\DB\DBConnection;
use Exception;

class DBConfig
{
    private static $_connections;
    private static $_defaultConnection;

    public static function addConnections($dbms, $params){
        self::$_connections[] = new DBConnection($dbms, $params);
    }

    public static function getConnection($dbms, $dbName){
        foreach(self::$_connections as $conn){
            if($conn->dbms === $dbms && $conn->database === $dbName){
                return $conn;
            }
        }
        return false;
    }

    public static function setDefault($dbms, $dbName){
        try{
            $conn = self::getConnection($dbms, $dbName);
            if(!$conn){
                throw new Exception();
            }
            self::$_defaultConnection = $conn;
        }
        catch (Exception $e){

        }
    }

    public static function getDefault(){
        return self::$_defaultConnection;
    }
}
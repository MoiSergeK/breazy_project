<?php

namespace App\Core\Common\DB;

use App\Core\Common\Config\DBConfig;

class DBConnector
{
    private $_connection;
    private static $_connector;

    public static function getConnection() {
        if(self::$_connector == null){
            self::$_connector = new DBConnector();
        }
        return self::$_connector;
    }

    public function setDefaultConnection(){
        $conn = DBConfig::getDefault();
        $this->use($conn->dbms, $conn->database);
    }

    public function use($dbms, $db){
        $this->_connection = DBConnectionBuilder::getPDO($dbms, $db);
    }

    public function exec($sql) {
        $this->_connection->query($sql);
    }

    public function get($sql) {
        $query_rows = $this->_connection->query($sql);
        return new DB($query_rows);
    }
}
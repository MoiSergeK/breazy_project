<?php

namespace App\Core\Common\DB;

use App\Core\Common\ConfigManager;

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
        $configManager = new ConfigManager();
        foreach($configManager->db()['default'] as $key => $value){
            $this->use($key, $value);
            return;
        }
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
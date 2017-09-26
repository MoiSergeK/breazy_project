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
        $default = array_map(function($item){
            return trim($item);
        }, explode(':', $configManager->db()['default']));
        $this->use($default[0], $default[1]);
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
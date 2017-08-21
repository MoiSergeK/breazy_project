<?php

namespace App\Core\Common\DB;


use App\Core\Common\ConfigManager;
use PDO;

class DBConnector
{
    private $_connection;
    private $_DBMSInUse;
    private $_DBInUse;
    private $_settings;

    public function __construct()
    {
        $configManager = new ConfigManager();
        $this->_settings = $configManager->db();

        if($this->_settings != []){
            $this->_DBMSInUse = array_keys($this->_settings)[0];
            $this->_DBInUse = $this->_settings[$this->_DBMSInUse][0];
        }

        $this->connect();
    }

    public function useDBMS($DBMSname) : void{
        $this->_DBMSInUse = $DBMSname;
    }

    public function useDB($DBname) : void{
        $this->_DBInUse = $DBname;
    }

    public function connect() : void{
        $db = $this->_DBInUse['database'];
        $host = $this->_DBInUse['host'];
        $username = $this->_DBInUse['username'];
        $password = $this->_DBInUse['password'];
        $this->_connection = new PDO("mysql:dbname=$db;host=$host", $username, $password);
    }

    public function exec($SQLQuery) : array{
        return $this->_connection->query($SQLQuery);
    }
}
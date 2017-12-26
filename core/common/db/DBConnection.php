<?php

namespace App\Core\Common\DB;


class DBConnection
{
    public $dbms;
    public $host;
    public $port;
    public $username;
    public $password;
    public $database;

    public function __construct($dbms, $params){
        $this->dbms = $dbms;
        $this->host = $params['host'];
        $this->port = $params['port'];
        $this->username = $params['username'];
        $this->password = $params['password'];
        $this->database = $params['database'];
    }
}
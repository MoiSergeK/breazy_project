<?php
namespace App\Core\Common\DB;


use App\Core\Common\Config\DBConfig;
use PDO;
use function PHPSTORM_META\type;

class DBConnectionBuilder
{
    public static function getPDO($dbms, $dbName){
        $db_settings = DBConfig::getDefault();

        $host = $db_settings->host;
        $port = $db_settings->port;
        $username = $db_settings->username;
        $password = $db_settings->password;

        $pdo = new PDO("$dbms:dbname=$dbName;host=$host;port=$port;charset=utf8", $username, $password);

        return $pdo;
    }
}
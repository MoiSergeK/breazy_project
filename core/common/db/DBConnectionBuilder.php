<?php
namespace App\Core\Common\DB;


use App\Core\Common\ConfigManager;
use PDO;
use function PHPSTORM_META\type;

class DBConnectionBuilder
{
    public static function getPDO($dbms, $db){
        $configManager = new ConfigManager();
        $db_settings = array_filter($configManager->db()['databases'], function($item) use($db){
            return $item['database'] == $db;
        })[$dbms];

        $host = $db_settings['host'];
        $port = $db_settings['port'];
        $username = $db_settings['username'];
        $password = $db_settings['password'];

        $pdo = new PDO("$dbms:dbname=$db;host=$host;port=$port;charset=utf8", $username, $password);

        return $pdo;
    }
}
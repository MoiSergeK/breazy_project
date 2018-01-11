<?php

namespace App\Core\Common\DB;


use App\Core\Common\Config\DBConfig;

class DBManager
{
    public static function setDefaultConnectionType() {
        if(!DBConfig::isUseLocalDB()) {
            DBConnector::getConnection()->setDefaultConnection();
        }
    }
}
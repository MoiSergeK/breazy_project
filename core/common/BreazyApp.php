<?php

namespace App\Core\Common;

use App\Core\Common\DB\DBConnector;

class BreazyApp
{
    public static function buildPage(){
        self::_setDBInits();
        echo eval("?>" . (new Router())->getPage());
    }

    private static function _setDBInits(){
        DBConnector::getConnection()->setDefaultConnection();
    }
}
<?php

namespace App\Core\Common;

use App\Core\Common\DB\DBConnector;
use App\Core\Common\Routing\Router;

require_once "config/routes.php";
require_once "config/config.php";

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
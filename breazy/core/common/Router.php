<?php
/**
 * Created by PhpStorm.
 * User: igor-togo
 * Date: 23.07.2017
 * Time: 1:28
 */

namespace App\Core\Common;

final class Router
{
    private static $CURRENT_URL;
    private static $ERROR_404 = "404";

    public static function getPage() : string {
        self::$CURRENT_URL = $_SERVER['REQUEST_URI'];
        $routes = self::getRoutes();
        $action = self::_getRouteAction($routes);
        if($action !== self::$ERROR_404){
            $action = explode("::", self::_getRouteAction($routes));
            $class_name = SysPathsHolder::CONTROLLERS_NAMESPACE()."\\$action[0]";
            $classInstance = new $class_name();
            $method = $action[1];
            return $classInstance->$method();
        }
        else{
            die();
        }
    }

    private static function getRoutes() : array{
        $filename = SysPathsHolder::ROUTES_PATH();
        $file_data = file_get_contents($filename);
        $data = (array) json_decode($file_data);
        return $data;
    }

    private static function _getRouteAction(&$routes) : string {
        foreach($routes as $route => $action){
            if($route == self::$CURRENT_URL){
                return $action;
            }
        }
        return self::$ERROR_404;
    }
}
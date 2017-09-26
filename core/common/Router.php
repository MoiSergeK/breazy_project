<?php

namespace App\Core\Common;

final class Router
{
    private $CURRENT_URL;
    private $ERROR_404 = "404";

    public function getPage() : string {
        $this->CURRENT_URL = $_SERVER['REQUEST_URI'];
        $routes = $this->getRoutes();
        $action = $this->_getRouteAction($routes);
        if($action !== $this->ERROR_404){
            $action = explode("::", $this->_getRouteAction($routes));
            $class_name = Path::getControllerNamespace($action[0]);
            $classInstance = new $class_name();
            $method = $action[1];
            return $classInstance->$method();
        }
        else{
            die();
        }
    }

    private function getRoutes() : array{
        $data = File::getRoutes(true);
        return $data;
    }

    private function _getRouteAction(&$routes) : string {
        foreach($routes as $route => $action){
            if($route === explode('?', $this->CURRENT_URL)[0]){
                return $action;
            }
        }
        return $this->ERROR_404;
    }
}
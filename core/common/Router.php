<?php

namespace App\Core\Common;

require_once "config/routes.php";

final class Router
{
    use Request;

    private $CURRENT_URL;
    private $ERROR_404 = "/404";

    public function getPage() : string {
        $this->CURRENT_URL = $_SERVER['REQUEST_URI'];

        $route = $this->_getRoute();

        if(!$route){
            Request::redirect($this->ERROR_404);
        }
        else{
            $route = new RouteModel($route);

            if($route->needRedirect){
                Request::redirect($route->url);
            }
            else{
                $class_name = Path::getControllerNamespace(ucwords($route->class_name) . "Controller");
                $controller = new $class_name();
                $action = $route->action_name;
                return $controller->$action();
            }
        }
    }

    private function _getRoute(){
        $url = explode('?', $this->CURRENT_URL)[0];
        return Route::getRoute($url);
    }
}
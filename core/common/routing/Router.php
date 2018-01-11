<?php

namespace App\Core\Common\Routing;

use App\Core\Common\Routing\RouteModel;
use App\Core\Common\Sys\Path;

require_once "config/routes.php";

final class Router
{
    use Request;

    private $CURRENT_URL;
    private $CURRENT_REQUEST_METHOD;
    private $ERROR_404 = "/404";

    public function getPage() : string {
        $this->CURRENT_URL = $_SERVER['REQUEST_URI'];
        $this->CURRENT_REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
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
        $url_str = explode('?', $this->CURRENT_URL);
        $url = $url_str[0];
        if(count($url_str) > 1 && $url[strlen($url) - 1] == '/'){
            $url = substr($url, 0, strlen($url) - 1);
        }
        return Route::getRoute($url, $this->CURRENT_REQUEST_METHOD);
    }
}
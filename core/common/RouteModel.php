<?php

namespace App\Core\Common;


class RouteModel
{
    public $method;
    public $url;
    public $class_name;
    public $action_name;
    public $needRedirect = false;

    public function __construct($route)
    {
        $this->method = $route['method'];
        $data = $route['data'];

        $this->url = $data['url'];
        if(isset($data['redirect'])){
            $this->needRedirect = true;
            $this->url = $data['redirect'];
        }

        $this->class_name = $data['handle'][0];
        $this->action_name = $data['handle'][1];
    }
}
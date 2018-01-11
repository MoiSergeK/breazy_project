<?php

namespace App\Core\Common\Routing;


use App\Core\Common\Auth\Auth;
use App\Core\Common\Auth\JWTAuth;

class Route
{
    /*
     * ---------------------------------------------<< FIELDS >>--------------------------------------------------------
    */

    private static $_routes = [];
    private $_url;
    private $_canPerform = true;

    public function __construct($url)
    {
        $this->_url = $url;
    }

    /*
     * -----------------------------------------------<< REST >>--------------------------------------------------------
    */

    public static function GET($url){
        self::$_routes['GET'][] = ['url' => $url];
        return new Route($url);
    }

    public static function POST($url){
        self::$_routes['POST'][] = ['url' => $url];
        return new Route($url);
    }

    public static function PUT($url){
        self::$_routes['PUT'][] = ['url' => $url];
        return new Route($url);
    }

    public static function DELETE($url){
        self::$_routes['DELETE'][] = ['url' => $url];
        return new Route($url);
    }

    /*
     * -----------------------------------------------<< FUNCS >>-------------------------------------------------------
    */

    public static function auth(){
        return Auth::checkAccess();
    }

    public static function getRoute($url, $method){
        foreach(self::$_routes as $key => $value){
            foreach($value as $id => $r){
                if($method === $key && $r['url'] === $url){
                    return ['method' => $key, 'data' => $r];
                }
            }
        }
        return false;
    }

    public function load($controller, $method){
        if($this->_canPerform){
            foreach(self::$_routes as $key => &$value){
                foreach($value as $id => &$r){
                    if($r['url'] == $this->_url){
                        $r['handle'] = [$controller, $method];
                    }
                }
            }
        }
        return $this;
    }

    public function go($url){
        if($this->_canPerform){
            foreach(self::$_routes as &$route){
                foreach($route as &$r){
                    if($r['url'] === $this->_url){
                        $r['redirect'] = $url;
                    }
                }
            }
        }
        return $this;
    }

    public function if($condition){
        $this->_canPerform = $condition === true;
        return $this;
    }

    public function else(){
        $this->_canPerform = !$this->_canPerform;
        return $this;
    }
}
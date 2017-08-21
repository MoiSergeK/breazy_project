<?php
/**
 * Created by PhpStorm.
 * User: igor-togo
 * Date: 23.07.2017
 * Time: 2:05
 */

namespace App\Core\Common;


final class SysPathsHolder
{
    public static $PROJECT_PATH = null;

    public static function ROUTES_PATH() : string {
        return self::CONFIG_PATH() . "/routes.json";
    }

    public static function VIEWS_PATH() : string {
        return self::_getHttpPath() . "/public/views";
    }

    public static function MODELS_PATH() : string {
        return self::_getHttpPath() . "/models";
    }

    public static function JS_PATH() : string {
        return self::_getHttpPath() . "/public/static/js";
    }

    public static function CSS_PATH() : string {
        return self::_getHttpPath() . "/public/static/css";
    }
    public static function IMG_PATH() : string {
        return self::_getHttpPath() . "/public/static/img";
    }

    public static function CONTROLLERS_PATH() : string {
        return self::_getHttpPath() . "/controllers";
    }

    public static function CONTROLLERS_NAMESPACE() : string {
        return "App\Http\Controllers";
    }

    public static function TEMPLATE_ENGINE_PATH() : string
    {
        return self::_getCorePath() . "/template_engine";
    }

    public static function COMMON_PATH() : string
    {
        return self::_getCorePath() . "/common";
    }

    public static function CONFIG_PATH() : string {
        return self::$PROJECT_PATH . "/config";
    }

    private static function _getHttpPath() : string {
        return self::$PROJECT_PATH . "/http";
    }

    private static function _getCorePath() : string {
        return self::$PROJECT_PATH . "/core";
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: igor-togo
 * Date: 17.08.2017
 * Time: 21:00
 */

namespace App\Core\Common;


class SysPathsManager
{
    public static function getViewPath($path) : string {
        return SysPathsHolder::VIEWS_PATH() . "/" . $path;
    }

    public static function getView($path) : string {
        return file_get_contents(SysPathsHolder::VIEWS_PATH() . "/" . $path);
    }

    public static function getControllerPath($path) : string {
        return SysPathsHolder::CONTROLLERS_PATH() . "/" . $path;
    }

    public static function getConfig() : string{
        return SysPathsHolder::CONFIG_PATH() . "/config.json";
    }
}
<?php

namespace App\Core\Common\Sys;


use App\Core\Common\Config\FileConfig;

class Path
{
    public static $PROJECT_PATH;

    public static function getViewPath($view_name){
        return self::$PROJECT_PATH . '/public/views/' . $view_name;
    }

    public static function getStylePath($style_name){
        return self::$PROJECT_PATH . '/public/assets/css/' . $style_name;
    }

    public static function getScriptPath($script_name){
        return self::$PROJECT_PATH . '/public/assets/js/' . $script_name;
    }

    public static function getFilePath($file_name, $type = null){
        return FileConfig::getPath($type) . '/' . $file_name;
    }

    public static function getFilesPath($fileType) : string {
        return self::$PROJECT_PATH . FileConfig::getPath($fileType);
    }

    public static function getControllerPath($controller_name){
        return self::$PROJECT_PATH . '/http/controllers/' . $controller_name . '.php';
    }

    public static function getControllerNamespace($controller_name){
        return "App\Http\Controllers\\$controller_name";
    }

    public static function getConfigPath(){
        return self::$PROJECT_PATH . '/config/config.yml';
    }

    public static function getRoutesPath(){
        return self::$PROJECT_PATH . '/config/routes.yml';
    }
}
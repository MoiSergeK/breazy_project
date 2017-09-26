<?php
/**
 * Created by PhpStorm.
 * User: igor-togo
 * Date: 09.09.2017
 * Time: 1:37
 */

namespace App\Core\Common;


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
        $dirs = (new ConfigManager())->files()['dirs'];
        $files_path = $dirs['root'];
        if($type != null){
            if($type === 'img'){
                $files_path .= '/' . $dirs['img'] . '/' . $file_name;
            }
        }
        return $files_path;
    }

    public static function getFilesPath($file_type) : string {
        $dirs = (new ConfigManager())->files()['dirs'];
        $files_path = $dirs['root'];

        if($file_type === File::IMG){
            $files_path .= '/' . $dirs['img'];
        }

        return self::$PROJECT_PATH . "/$files_path";
    }

    public static function getControllerPath($controller_name){
        return self::$PROJECT_PATH . '/http/controllers/' . $controller_name . '.php';
    }

    public static function getControllerNamespace($controller_name){
        return "App\Http\Controllers\\$controller_name";
    }

    public static function getConfigPath(){
        return self::$PROJECT_PATH . '/config/config.json';
    }

    public static function getRoutesPath(){
        return self::$PROJECT_PATH . '/config/routes.json';
    }
}
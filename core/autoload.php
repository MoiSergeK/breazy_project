<?php

use App\Core\Common\Path;

function init_autoload($__DIR__){
    spl_autoload_register(function ($class_name) use($__DIR__) {
        $class_namespace = explode('\\', $class_name);
        $class_name = $class_namespace[count($class_namespace) - 1] . ".php";
        array_walk($class_namespace, function(&$value){
            $value = strtolower($value);
        });

        $class_namespace[0] = '';
        $class_namespace[count($class_namespace) - 1] = $class_name;
        $class_path = implode("\\", $class_namespace);

        $final_class_path = str_replace("\\", "/",$__DIR__ . $class_path);

        require_once($final_class_path);

        if(Path::$PROJECT_PATH == null){
            Path::$PROJECT_PATH = str_replace("\\", "/",$__DIR__);
        }
    });
}
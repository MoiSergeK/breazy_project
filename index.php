<?php

use App\Core\Common\Router;

use App\Core\Common\SysPathsHolder;

spl_autoload_register(function ($class_name) {
    $class_namespace = explode('\\', $class_name);
    $class_name = $class_namespace[count($class_namespace) - 1] . ".php";
    array_walk($class_namespace, function(&$value){
       $value = strtolower($value);
    });

    $class_namespace[0] = "\breazy";
    $class_namespace[count($class_namespace) - 1] = $class_name;
    $class_path = implode("\\", $class_namespace);

    require_once(str_replace("\\", "/",__DIR__ . $class_path));

    if(SysPathsHolder::$PROJECT_PATH == null){
        SysPathsHolder::$PROJECT_PATH = str_replace("\\", "/",__DIR__ . "/breazy");
    }
});

echo Router::getPage();

?>
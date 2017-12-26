<?php

namespace App\Core\Common\Sys;


trait ClassPathsIncluder
{
    public function add(string $class_name) : void {
        require_once(SysPathsHolder::COMMON_PATH() . "\\$class_name.php");
    }
}
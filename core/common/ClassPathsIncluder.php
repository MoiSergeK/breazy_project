<?php
/**
 * Created by PhpStorm.
 * User: igor-togo
 * Date: 23.07.2017
 * Time: 3:35
 */

namespace App\Core\Common;


trait ClassPathsIncluder
{
    public function add(string $class_name) : void {
        require_once(SysPathsHolder::COMMON_PATH() . "\\$class_name.php");
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: igor-togo
 * Date: 24.07.2017
 * Time: 1:33
 */

namespace App\Core\Common;


class DBConnector
{
    public function __construct()
    {
        #include \App\Core\Common\SysPathsHolder::CONFIG_PATH() . "\\config.json";
    }
}
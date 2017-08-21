<?php
/**
 * Created by PhpStorm.
 * User: igor-togo
 * Date: 15.08.2017
 * Time: 17:07
 */

namespace App\Core\Common;


class ConfigManager
{
    private $_configFile;

    public function __construct()
    {
        $fileContent = SysPathsManager::getConfig();
        $this->_configFile = json_decode($fileContent, true);
    }

    public function __call($name, $arguments)
    {
        if(array_key_exists($name, $this->_configFile)){
            return $this->_configFile[$name];
        }
        return false;
    }
}
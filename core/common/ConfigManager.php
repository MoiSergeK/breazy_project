<?php

namespace App\Core\Common;


class ConfigManager
{
    private $_configFile;

    public function __construct()
    {
        $this->_configFile = File::getConfig(true);
    }

    public function __call($name, $arguments)
    {
        if(array_key_exists($name, $this->_configFile)){
            return $this->_configFile[$name];
        }
        return false;
    }
}
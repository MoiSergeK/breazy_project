<?php

namespace App\Config;

use App\Core\Common\Config\DBConfig;
use App\Core\Common\Config\FileConfig;
use App\Core\Common\Config\LogConfig;

/*
 * --------------------------------------------------<< DB CONFIG >>----------------------------------------------------
 */

DBConfig::addConnections('mysql', [
    'host' => 'localhost',
    'port' => '3308',
    'username' => 'root',
    'password' => '1234',
    'database' => 'u348009671_projs'
]);

DBConfig::setDefault('mysql', 'u348009671_projs');

/*
 * -------------------------------------------------<< FILE CONFIG >>---------------------------------------------------
 */

FileConfig::setRootPath('/public/files');
FileConfig::setImgPath('img');
FileConfig::setAudioPath('audio');
FileConfig::setVideoPath('video');
FileConfig::setDocPath('doc');

/*
 * -------------------------------------------------<< LOG CONFIG >>----------------------------------------------------
 */

LogConfig::setLocalLog('app/log.txt');
LogConfig::setDBLog('mysql', 'u348009671_projs', 'logs');


<?php
/**
 * Created by PhpStorm.
 * User: igor-togo
 * Date: 25.12.2017
 * Time: 20:18
 */

namespace App\Core\Common\Config;


class FileConfig
{
    private static $_rootPath;
    private static $_imgPath;
    private static $_audioPath;
    private static $_videoPath;
    private static $_docPath;

    public static function setRootPath($path){
        self::$_rootPath = $path;
    }

    public static function getPath($pathType){
        switch($pathType){
            case 'img':
                return FileConfig::getImgPath();
            case 'audio':
                return FileConfig::getAudioPath();
            case 'video':
                return FileConfig::getVideoPath();
            case 'doc':
                return FileConfig::getDocPath();
            default:
                return false;
        }
    }

    public static function setImgPath($path){
        self::$_imgPath = $path;
    }
    public static function getImgPath(){
        return self::$_rootPath . '/' . self::$_imgPath;
    }

    public static function setAudioPath($path){
        self::$_audioPath = $path;
    }
    public static function getAudioPath(){
        return self::$_rootPath . '/' . self::$_audioPath;
    }

    public static function setVideoPath($path){
        self::$_videoPath = $path;
    }
    public static function getVideoPath(){
        return self::$_rootPath . '/' . self::$_videoPath;
    }

    public static function setDocPath($path){
        self::$_docPath = $path;
    }
    public static function getDocPath(){
        return self::$_rootPath . '/' . self::$_docPath;
    }
}
<?php

namespace App\Core\Common\DB;

use App\Core\Common\Config\FileConfig;
use App\Http\Models\Project;
use App\Http\Models\Tag;

class LocalDBManager
{
    public static function getAll($modelName) {
        $modelName = self::_makeModelName($modelName);
        FileConfig::getLocalDBPath();
        $data = self::_readFile($modelName);

        return Tag::wrapArray($data);
    }

    public static function getWhere($modelName, $condition) {
        $modelName = self::_makeModelName($modelName);
        FileConfig::getLocalDBPath();
        $key = $condition[0];
        $operation = $condition[1];
        $value = $condition[2];
        $data = self::_readFile($modelName);
        $selectedData = [];

        foreach($data as $model){
            if($operation == '='){
                if($model[$key] == $value){
                    $selectedData[] = $model;
                }
            } elseif ($operation == 'in') {
                if(in_array($model[$key], $value)){
                    $selectedData[] = $model;
                }
            }
        }

        return Project::wrapArray($selectedData);
    }

    public static function insert($modelName, $model) {
        $modelName = self::_makeModelName($modelName);
        FileConfig::getLocalDBPath();
        $data = self::_readFile($modelName);
        $model['id'] = self::_getMaxId($data) + 1;
        $data[] = $model;
        self::_writeFile($modelName, $data);
    }

    public static function find($modelName, $id) {
        $modelName = self::_makeModelName($modelName);
        FileConfig::getLocalDBPath();
        $data = self::_readFile($modelName);
        foreach($data as $rec){
            if($rec['id'] == $id){
                return Project::wrap($rec);
            }
        }
        return Project::empty();
    }

    public static function delete($modelName, $id){
        $modelName = self::_makeModelName($modelName);
        FileConfig::getLocalDBPath();
        $data = self::_readFile($modelName);
        foreach($data as $i => $rec){
            if($rec['id'] == $id){
                unset($data[$i]);
                break;
            }
        }
        self::_writeFile($modelName, $data);
    }

    // -----------------------------------------------------------------------------------------------------------

    private static function _getMaxId(&$data) {
        $id = 0;
        foreach($data as $rec){
            if($rec['id'] > $id){
                $id = $rec['id'];
            }
        }
        return $id;
    }

    private static function _makeModelName($modelName) {
        return explode("\\", $modelName)[count(explode("\\", $modelName)) - 1];
    }

    private static function _readFile($modelName) {
        return json_decode(file_get_contents(FileConfig::getLocalDBPath() . '/' . $modelName . '.json'), true);
    }

    private static function _writeFile($modelName, $data) {
        file_put_contents(FileConfig::getLocalDBPath() . '/' .  $modelName . '.json', json_encode($data));
    }

}
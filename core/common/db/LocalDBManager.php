<?php

namespace App\Core\Common\DB;

use App\Core\Common\Config\FileConfig;

class LocalDBManager
{
    public static function getAll($MODEL) {
        $modelName = self::_makeModelName($MODEL);
        $data = self::_readFile($modelName);
        return $MODEL::wrapArray($data);
    }

    public static function andWhere($MODEL, $condition) {
        $modelName = self::_makeModelName($MODEL);
        $key1 = $condition[0][0];
        $func1 = self::_switchOperation($condition[0][1]);
        $value1 = $condition[0][2];
        $key2 = $condition[1][0];
        $func2 = self::_switchOperation($condition[1][1]);
        $value2 = $condition[1][2];
        $data = self::_readFile($modelName);
        $selectedData = [];

        foreach($data as $model){
            if(self::$func1($data[$key1], $data[$value1]) and self::$func2($data[$key2], $data[$value2])){
                $selectedData[] = $model;
            }
        }
        return $MODEL::wrapArray($selectedData);
    }

    public static function getWhere($MODEL, $condition) {
        $modelName = self::_makeModelName($MODEL);
        $key = $condition[0];
        $operation = self::_switchOperation($condition[1]);
        $value = $condition[2];
        $data = self::_readFile($modelName);
        $selectedData = [];

        foreach($data as $rec){
            if(self::$operation($rec[$key], $value)){
                $selectedData[] = $rec;
            }
        }

        return $MODEL::wrapArray($selectedData);
    }

    public static function insert($MODEL, $model) {
        $modelName = self::_makeModelName($MODEL);
        $data = self::_readFile($modelName);
        $model['id'] = self::_getMaxId($data) + 1;
        $data[] = $model;
        self::_writeFile($modelName, $data);
    }

    public static function find($MODEL, $id) {
        $modelName = self::_makeModelName($MODEL);
        $data = self::_readFile($modelName);
        foreach($data as $rec){
            if($rec['id'] == $id){
                return $MODEL::wrap($rec);
            }
        }
        return $MODEL::makeEmpty();
    }

    public static function delete($MODEL, $id){
        $modelName = self::_makeModelName($MODEL);
        $data = self::_readFile($modelName);
        foreach($data as $i => $rec){
            if($rec['id'] == $id){
                unset($data[$i]);
                break;
            }
        }
        self::_writeFile($modelName, $data);
    }

    public static function update($MODEL, $searchKey, $data) {
        $modelName = self::_makeModelName($MODEL);
        $recs = self::_readFile($modelName);
        foreach($recs as $rec){
            if(self::_eq($rec[$searchKey], $data[$searchKey])){
                foreach ($data as $key => $value) {
                    $rec[$key] = $value;
                }
                break;
            }
        }
        self::_writeFile($modelName, $recs);
    }

    public static function last($MODEL) {
        $modelName = self::_makeModelName($MODEL);
        $recs = self::_readFile($modelName);
        return $recs[self::_getMaxId($recs)];
    }

    // -----------------------------------------------------------------------------------------------------------

    private static function _switchOperation($oper) {
        switch($oper){
            case '=':
                return '_eq';
            case 'in':
                return '_in';
        }
    }

    private static function _eq($v1, $v2) {
        return $v1 == $v2;
    }

    private static function _in($arr, $elem) {
        return in_array($arr, $elem);
    }

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
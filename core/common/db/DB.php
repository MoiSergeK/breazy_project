<?php

namespace App\Core\Common\DB;


use PDO;

class DB
{
    private $_query_rows;

    public function __construct($query_rows)
    {
        $this->_query_rows = $query_rows;
    }

    public function getData() : array {
        return $this->_query_rows->fetchAll(PDO::FETCH_ASSOC);
    }

    public function toModel($model_name) : array
    {
        $models = [];

        while ($query_row = $this->_query_rows->fetch(PDO::FETCH_ASSOC)) {
            $model = new $model_name();
            foreach ($query_row as $key => $value) {
                $model->$key = $value;
            }
            array_push($models, $model);
        }

        return $models;
    }

    public static function use($dbms, $db){
        DBConnector::getConnection()->use($dbms, $db);
    }

    public static function sql($sql){
        if(explode(' ', $sql)[0] === 'select'){
            return DBConnector::getConnection()->get($sql);
        }
        DBConnector::getConnection()->exec($sql);
    }

    public static function extractField($models, $field){
        $array = [];
        foreach($models as $model){
            array_push($array, $model->$field);
        }
        return $array;
    }
}
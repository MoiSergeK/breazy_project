<?php

namespace App\Core\Common\DB;


use App\Http\Models\Project;

abstract class Model
{
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return isset($this->$name) ? $this->$name : 'NULL';
    }

    public static function sql($sql){
        return DB::sql($sql)->toModel(get_called_class());
    }

    public static function wrapArray($data)
    {
        $models = [];
        foreach ($data as $fields){
            $model = new Project();
            foreach($fields as $key => $value){
                $model->$key = $value;
            }
            $models[] = $model;
        }
        return $models;
    }

    public static function wrap($data)
    {
        $model = new Project();
        foreach ($data as $key => $value){
            $model->$key = $value;
        }
        return $model;
    }

    public static function empty(){
        $class = get_called_class();
        return $class;
    }

    public function __call($name, $arguments)
    {
        try{
            $func_name = explode('find_by_', $name)[1];
        }
        catch (\OutOfRangeException $e){
            return null;
        }
    }

    protected function not_null($field){
        return "$field not null";
    }

    protected function pk($field){
        return "primary $field";
    }

    protected function int($is_auto_incremeted = false, $is_pk = false){
        return "int";
    }

    protected function string($size = 300, $is_pk = false){
        return "varchar($size)";
    }

    protected function text($is_pk = false){
        return "text";
    }

    protected function timestamp($is_pk = false){
        return "timestamp";
    }
}
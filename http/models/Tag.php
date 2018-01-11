<?php
/**
 * Created by PhpStorm.
 * User: igor-togo
 * Date: 16.09.2017
 * Time: 18:05
 */

namespace App\Http\Models;


use App\Core\Common\DB\Model;

class Tag extends Model
{
    public $id;
    public $name;

    public function __construct()
    {
        $this->id = $this->pk($this->int());
        $this->name = $this->string();
    }
}
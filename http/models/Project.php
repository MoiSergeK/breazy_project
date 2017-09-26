<?php

namespace App\Http\Models;

use App\Core\Common\DB\Model;

class Project extends Model
{
    public $id;
    public $name;
    public $description;
    public $logo;
    public $type;

    public function __construct()
    {
        $this->id = $this->pk($this->int());
        $this->name = $this->string();
        $this->description = $this->text();
        $this->logo = $this->string();
        $this->type = $this->string(10);
    }
}
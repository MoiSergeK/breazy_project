<?php

namespace App\Http\Models;

use App\Core\Common\DB\Model;

class ProjectTag extends Model
{
    public $project_id;
    public $tag_id;

    public function __construct()
    {
        $this->project_id = $this->pk($this->int());
        $this->tag_id = $this->string();
    }
}
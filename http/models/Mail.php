<?php

namespace App\Http\Models;

use App\Core\Common\DB\Model;

class Mail extends Model
{
    public $id;
    public $name;
    public $email;
    public $message;

    public function __construct()
    {
        $this->id = $this->pk($this->int());
        $this->name = $this->string();
        $this->email = $this->string();
        $this->message = $this->text();
    }
}
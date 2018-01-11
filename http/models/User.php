<?php

namespace App\Http\Models;

use App\Core\Common\DB\Model;

class User extends Model
{
    public $id;
    public $login;
    public $password;
    public $remember_token;

    public function __construct()
    {
        $this->id = $this->pk($this->int());
        $this->login = $this->string();
        $this->password = $this->text();
        $this->remember_token = $this->string();
    }
}
<?php

namespace App\Core\Common\Auth;


class JWT
{
    public static function validate(){
        $token = $_COOKIE['Authorization'];
        return true;
    }
}
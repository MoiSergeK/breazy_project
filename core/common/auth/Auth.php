<?php

namespace App\Core\Common\Auth;

use App\Core\Common\Config\CommonConfig;
use App\Core\Common\DB\DB;
use App\Core\Common\Routing\Request;
use App\Http\Models\User;
use App\Http\Repositories\UserRepository;

class Auth
{
    use Request;

    public static function checkAccess() {
        return isset($_COOKIE['Authorization']) && $_COOKIE['Authorization'] == CommonConfig::get('secret');
    }

    public static function userExists($login, $password) : bool {
        return (new UserRepository())->exists($login, $password);
    }

    public static function login($login) {
        //$remember_token = md5(random_bytes(10));

        $remember_token = CommonConfig::get('secret');
        (new UserRepository())->exists($login, 'login', ['remeber_token' => $remember_token, 'login' => $login]);
        setcookie("Authorization", CommonConfig::get('secret'));
    }

    public static function logout() {
        setcookie("Authorization", null);
    }
}
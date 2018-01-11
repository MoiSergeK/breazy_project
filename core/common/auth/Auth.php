<?php

namespace App\Core\Common\Auth;

use App\Core\Common\Config\CommonConfig;
use App\Core\Common\DB\DB;
use App\Core\Common\Routing\Request;
use App\Http\Models\User;

class Auth
{
    use Request;

    public static function checkAccess() {
        return isset($_COOKIE['Authorization']) && $_COOKIE['Authorization'] == CommonConfig::get('secret');
    }

    public static function userExists($login, $password) : bool {
        $sql = "select count(*) as users from users where login='$login' and password='$password';";
        $user = User::sql($sql);

        return $user[0]->users == 1;
    }

    public static function login($login) {
        //$remember_token = md5(random_bytes(10));

        $remember_token = CommonConfig::get('secret');
        $sql = "update users set remember_token=$remember_token where login $login;";
        DB::sql($sql);
        setcookie("Authorization", CommonConfig::get('secret'));
    }

    public static function logout() {
        setcookie("Authorization", null);
    }
}
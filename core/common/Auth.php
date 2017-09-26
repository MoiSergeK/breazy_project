<?php

namespace App\Core\Common;


use App\Core\Common\DB\DB;
use App\Http\Models\User;

class Auth
{
    use Request;

    public static function isLogged() : bool {
        /*if(!isset($_SESSION)){
            echo 'adasd';
        }*/
        if(isset($_COOKIE['breazy_token'])){
            return true;
        }
        return false;
    }

    public static function check(){
        if(!Auth::isLogged()){
            self::redirect("/login");
        }
    }

    public static function userExists($login, $password) : bool {
        $sql = "select count(*) as users from users where login='$login' and password='$password';";
        $user = User::sql($sql);

        return $user[0]->users == 1;
    }

    public static function login($login) {
        $remember_token = md5(random_bytes(10));

        $sql = "update users set remember_token=$remember_token where login $login;";
        DB::sql($sql);

        session_start();
        $_SESSION['user_remember_token'] = $remember_token;
        setcookie("breazy_token", "$login:$remember_token");
    }

    public static function logout() {
        session_start();
        setcookie("breazy_token", null);
        session_destroy();
    }
}
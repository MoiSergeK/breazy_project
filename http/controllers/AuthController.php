<?php

namespace App\Http\Controllers;

use App\Core\Common\Auth;

class AuthController extends Controller
{
    public function index() {
        return $this->view('login');
    }

    public function login(){
        $login = $_POST['login'];
        $password = md5($_POST['password']);

        if(Auth::userExists($login, $password)){
            $this->authUser($login);
        }
        self::redirect("/admin");
    }

    public function logout(){
        Auth::logout();
        self::redirect("/admin");
    }

    private function authUser($login){
        Auth::login($login);
        self::redirect("/admin");
    }
}
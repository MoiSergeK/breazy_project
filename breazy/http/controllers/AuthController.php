<?php

namespace App\Http\Controllers;


class AuthController extends Controller
{
    public function index(){
        return $this->view('login');
    }

    public function auth(){
        $this->redirect("/");
    }
}
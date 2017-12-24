<?php

namespace App\Http\Controllers;

class LoggerController extends Controller
{
    public function index(){
        $logs = $this->_unitOfWork->logs->getAll();
        return $this->view('logger', ['logs' => $logs, 'title' => 'Log']);
    }

    public function addMessage(){
        $this->_unitOfWork->logs->add($_GET['msg']);
        self::redirect('/logger');
    }
}
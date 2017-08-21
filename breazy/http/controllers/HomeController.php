<?php

namespace App\Http\Controllers;

use App\Core\Common\SysPathsHolder;
use App\Http\Repositories\ProjectRepository;

class HomeController extends Controller
{
    public function index(){
        /*$projectRepository = new ProjectRepository();
        $records = $projectRepository->getAll();
        print_r($records);*/
        return $this->view("index",['title' => "Serge Kovalev CV"]);
    }

    public function apply_filter(){
        return $_POST['filters'];
    }
}
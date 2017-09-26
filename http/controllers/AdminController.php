<?php

namespace App\Http\Controllers;

use App\Core\Common\Auth;
use App\Core\Common\File;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Auth::check();
    }

    public function index(){
        $tags = $this->_unitOfWork->tags->getAll();
        return $this->view('/admin/admin', ['title' => 'Главная', 'tags' => $tags]);
    }

    public function projects(){
        $projects = $this->_unitOfWork->projects->getAll();
        return $this->view('/admin/admin_projects_list', ['title' => 'Все проекты', 'projects' => $projects]);
    }

    public function addProject(){
        $this->_unitOfWork->projects->create();
        $project_id = $this->_unitOfWork->projects->last()->id;
        $this->_unitOfWork->project_tag->create($project_id, $this->_unitOfWork->tags->getIds($_POST['tags']));
        self::redirect('/admin');
    }

    public function deleteProject(){
        $id = $_GET['id'];
        $logo = $this->_unitOfWork->projects->find($id)->logo;
        $this->_unitOfWork->projects->delete($id);
        $this->_unitOfWork->project_tag->delete($id);
        if($logo !== 'nologo.png'){
            File::delete($logo, File::IMG);
        }
        self::redirect('/admin_projects');
    }
}
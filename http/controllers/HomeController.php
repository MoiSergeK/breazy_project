<?php

namespace App\Http\Controllers;

use App\Core\Common\DB\DB;
use App\Core\Common\Path;

class HomeController extends Controller
{
    public function index(){
        $records = $this->_unitOfWork->projects->getCommercialProjects();
        $tags = $this->_unitOfWork->tags->getAll();
        return $this->view("index",
            [
                'title' => 'Home',
                'header' => "Serge Kovalev CV",
                'projects' => $records,
                'tags' => $tags
            ]);
    }

    public function myProjects(){
        $records = $this->_unitOfWork->projects->getOwnProjects();
        $tags = $this->_unitOfWork->tags->getAll();
        return $this->view("my_projects",
            [
                'title' => 'My Projects',
                'header' => "Serge Kovalev CV",
                'projects' => $records,
                'tags' => $tags
            ]);
    }

    public function applyFilter(){
        if($_POST['filters'] === ''){
            return json_encode($this->_unitOfWork->projects->getCommercialProjects());
        }
        $filters = explode(',', $_POST['filters']);
        $tags_ids = $ids = DB::extractField($this->_unitOfWork->tags->getIds($filters), 'id');
        $projects_ids = DB::extractField($this->_unitOfWork->project_tag->getProjectsIds($tags_ids), 'project_id');
        if($projects_ids != []){
            $projects = $this->_unitOfWork->projects->getByIds($projects_ids);
            return json_encode($projects);
        }
        return '[]';
    }

    public function getCardInfo(){
        $id = $_POST['id'];
        $project = $this->_unitOfWork->projects->find($id);
        $project->logo = Path::getFilePath($project->logo, 'img');
        $project_tags_ids = $this->_unitOfWork->project_tag->getTagsIds($id);
        $project_tags = $this->_unitOfWork->tags->getByIds($project_tags_ids);
        $project->tags = $project_tags;
        return json_encode($project);
    }

    public function addMail(){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $this->_unitOfWork->mails->add($name, $email, $message);
        self::redirect('/');
    }

    public function _404(){
        return $this->view('404');
    }
}
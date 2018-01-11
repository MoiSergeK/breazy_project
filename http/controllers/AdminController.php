<?php

namespace App\Http\Controllers;

use App\Core\Common\Sys\File;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $tags = $this->_unitOfWork->tags->getAll();
        return $this->view('/admin/admin', ['title' => 'Main', 'tags' => $tags]);
    }

    public function projects(){
        $projects = $this->_unitOfWork->projects->getAll();
        return $this->view('/admin/admin_projects_list', ['title' => 'All projects', 'projects' => $projects]);
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

    public function editProject(){
        $id = $_GET['id'];
        $project = $this->_unitOfWork->projects->find($id);
        $tags = $this->_unitOfWork->tags->getAll();
        $projectTagsIds = $this->_unitOfWork->project_tag->getTagsIds($id);
        if(count($projectTagsIds) > 0){
            $projectTags = $this->_unitOfWork->tags->getByIds($projectTagsIds);
            $projectTagsNames = [];
            foreach($projectTags as $tag)
                $projectTagsNames[] = $tag->name;
            $project->tags = $projectTagsNames;
        } else {
            $project->tags = [];
        }

        return $this->view('/admin/edit_project',
            ['title' => 'All projects', 'project' => $project, 'tags' => $tags]);
    }

    public function updateProject(){
        $this->_unitOfWork->projects->update();
        $this->_unitOfWork->project_tag->update();
        self::redirect('/admin/projects');
    }

    public function tags(){
        $tags = $this->_unitOfWork->tags->getAll();
        return $this->view('admin/tags', ['title' => 'Tags', 'tags' => $tags]);
    }

    public function addTag(){
        $tag = $_POST['tag'];
        $this->_unitOfWork->tags->create($tag);
        self::redirect('/admin/tags');
    }

    public function deleteTag(){
        $id = $_GET['id'];
        $this->_unitOfWork->tags->delete($id);
        self::redirect('/admin/tags');
    }

    public function mails(){
        $mails = $this->_unitOfWork->mails->getAll();
        return $this->view('/admin/mails', ['title' =>  'Mails', 'mails' => $mails]);
    }

    public function deleteMail(){
        $id = $_GET['id'];
        $this->_unitOfWork->mails->delete($id);
        self::redirect('/admin/mails');
    }
}
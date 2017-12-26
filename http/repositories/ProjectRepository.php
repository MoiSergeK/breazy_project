<?php

namespace App\Http\Repositories;

use App\Core\Common\DB\DB;
use App\Core\Common\File;
use App\Core\Common\Log;
use App\Http\Models\Project;

class ProjectRepository
{
    public function getAll() : array {
        return Project::sql("select * from projects");
    }

    public function getCommercialProjects(){
        return Project::sql("select * from projects where type = 'commercial'");
    }

    public function getOwnProjects(){
        return Project::sql("select * from projects where type = 'own'");
    }

    public function find($id){
        return Project::sql("select * from projects where id=$id")[0];
    }

    public function last(){
        return Project::sql("select * from projects order by id desc limit 1;")[0];
    }

    public function create(){
        $name = $_POST['name'];
        $description = $_POST['description'];
        if($_FILES['file']['size'] > 0){
            $logo = File::upload($_FILES['file']['tmp_name'], $_FILES['file']['name'], File::IMG);
        }
        else{
            $logo = 'nologo.png';
        }
        $type = $_POST['type'];
        DB::sql("insert into projects values(null, '$name', '$description', '$logo', '$type');");
    }

    public function delete($id){
        DB::sql("delete from projects where id=$id");
    }

    public function getByIds($projects_ids)
    {
        $ids = implode(',', $projects_ids);
        return Project::sql("select * from projects where id in ($ids)");
    }
}
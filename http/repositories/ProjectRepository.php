<?php

namespace App\Http\Repositories;

use App\Core\Common\Config\DBConfig;
use App\Core\Common\DB\DB;
use App\Core\Common\DB\LocalDBManager;
use App\Core\Common\Sys\File;
use App\Http\Models\Project;

class ProjectRepository
{
    public function getAll() : array {
        if(DBConfig::isUseLocalDB()){
            LocalDBManager::getAll(Project::class);
        }
        return Project::sql("select * from projects");
    }

    public function getCommercialProjects(){
        if(DBConfig::isUseLocalDB()){
            return LocalDBManager::getWhere(Project::class , ['type', '=', 'commercial']);
        }
        return Project::sql("select * from projects where type = 'commercial'");
    }

    public function getOwnProjects(){
        if(DBConfig::isUseLocalDB()){
            return LocalDBManager::getWhere(Project::class , ['type', '=', 'own']);
        }
        return Project::sql("select * from projects where type = 'own'");
    }

    public function find($id){
        if(DBConfig::isUseLocalDB()){
            return LocalDBManager::find(Project::class, $id);
        }
        return Project::sql("select * from projects where id=$id")[0];
    }

    public function last(){
        return Project::sql("select * from projects order by id desc limit 1;")[0];
    }

    public function create(){
        if($_FILES['file']['size'] > 0){
            $logo = File::upload($_FILES['file']['tmp_name'], $_FILES['file']['name'], File::IMG);
        }
        else{
            $logo = 'nologo.png';
        }

        if(DBConfig::isUseLocalDB()){
            $data = $_POST;
            $data['logo'] = $logo;
            return LocalDBManager::find(Project::class, $data);
        } else {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $type = $_POST['type'];
            DB::sql("insert into projects values(null, '$name', '$description', '$logo', '$type');");
        }
    }

    public function delete($id){
        if(DBConfig::isUseLocalDB()){
            LocalDBManager::delete(Project::class, $id);
        }
        DB::sql("delete from projects where id=$id");
    }

    public function getByIds($projects_ids)
    {
        if(DBConfig::isUseLocalDB()){
            LocalDBManager::getWhere(Project::class, ['id', 'in', $projects_ids]);
        }
        $ids = implode(',', $projects_ids);
        return Project::sql("select * from projects where id in ($ids)");
    }

    public function update() {
        if(DBConfig::isUseLocalDB()){
            LocalDBManager::update(Project::class, $_POST);
        } else {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $type = $_POST['type'];
            $sql = "update projects set name='$name', description='$description', type='$type' where id=$id";
            DB::sql($sql);
        }
    }
}
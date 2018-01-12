<?php

namespace App\Http\Repositories;


use App\Core\Common\Config\DBConfig;
use App\Core\Common\DB\DB;
use App\Core\Common\DB\LocalDBManager;
use App\Http\Models\Project;
use App\Http\Models\ProjectTag;
use App\Http\Models\Tag;

class ProjectTagRepository
{
    public function getAll() : array {
        return ProjectTag::sql("select * from tags");
    }

    public function create($project_id, $tags){

        if(count($tags) > 0) {
            foreach ($tags as $tag){
                if(DBConfig::isUseLocalDB()){
                    LocalDBManager::insert(ProjectTag::class, ['project_id' => $project_id, 'tag_ig' => $tag->id]);
                } else {
                    DB::sql("insert into project_tag values($project_id, $tag->id)");
                }
            }
        }
    }

    public function delete($id){
        if(DBConfig::isUseLocalDB()){
            LocalDBManager::delete(ProjectTag::class, $id);
        } else {
            DB::sql("delete from project_tag where project_id=$id");
        }
    }

    public function getTagsIds($project_id){
        if(DBConfig::isUseLocalDB()){
            return LocalDBManager::getWhere(ProjectTag::class, ['project_id', '=', $project_id]);
        }
        return Tag::sql("select tag_id from project_tag where project_id=$project_id;");
    }

    public function getProjectsIds($tags_ids) {
        if(DBConfig::isUseLocalDB()){
            return LocalDBManager::getWhere(ProjectTag::class, ['tag_id', 'in', $tags_ids])[0];
        }
        $formatted_tags_ids = implode(',', $tags_ids);
        return Project::sql("select distinct project_id from project_tag where tag_id in ($formatted_tags_ids);");
    }

    public function update() {
        $this->delete($_POST['id']);
        $tags = [];
        foreach ($_POST['tags'] as $tag){
            $t = new Tag();
            $t->id = $tag;
            $tags[] = $t;
        }
        $this->create($_POST['id'], $tags);
    }
}
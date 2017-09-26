<?php
/**
 * Created by PhpStorm.
 * User: igor-togo
 * Date: 09.09.2017
 * Time: 2:33
 */

namespace App\Http\Repositories;


use App\Core\Common\DB\DB;
use App\Http\Models\Project;
use App\Http\Models\ProjectTag;
use App\Http\Models\Tag;

class ProjectTagRepository
{
    public function getAll() : array {
        return ProjectTag::sql("select * from tags");
    }

    public function create($project_id, $tags){
        foreach ($tags as $tag){
            DB::sql("insert into project_tag values($project_id, $tag->id)");
        }
    }

    public function delete($id){
        DB::sql("delete from project_tag where project_id=$id");
    }

    public function getTagsIds($project_id){
        return Tag::sql("select tag_id from project_tag where project_id=$project_id;");
    }

    public function getProjectsIds($tags_ids)
    {
        $formatted_tags_ids = implode(',', $tags_ids);
        return Project::sql("select distinct project_id from project_tag where tag_id in ($formatted_tags_ids);");
    }
}
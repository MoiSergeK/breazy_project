<?php

namespace App\Http\Repositories;


use App\Http\Models\tag;

class TagRepository
{
    public function getAll() : array {
        return Tag::sql("select * from tags");
    }

    public function getIds($tags){
        $formatted_tags = $this->_listToString($tags);
        return Tag::sql("select id from tags where name in ($formatted_tags)");
    }

    public function getByIds($tags_ids){
        $ids = [];
        foreach($tags_ids as $tag_id){
            array_push($ids, $tag_id->tag_id);
        }
        $formatted_tags_ids = implode(',', $ids);
        return Tag::sql("select * from tags where id in ($formatted_tags_ids);");
    }

    private function _listToString($list){
        return '\'' . implode("','", $list) . '\'';
    }
}
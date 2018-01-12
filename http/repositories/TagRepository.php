<?php

namespace App\Http\Repositories;


use App\Core\Common\Config\DBConfig;
use App\Core\Common\DB\DB;
use App\Core\Common\DB\LocalDBManager;
use App\Http\Models\tag;

class TagRepository
{
    public function getAll() : array {
        if(DBConfig::isUseLocalDB()){
            return LocalDBManager::getAll(Tag::class);
        }
        return Tag::sql("select * from tags");
    }

    public function create($tag) {
        if(DBConfig::isUseLocalDB()){
            LocalDBManager::insert(Tag::class, ['name' => $tag]);
            return;
        }
        if(!$this->tagExists($tag))
            Tag::sql("insert into tags values(null, '$tag')");
    }

    public function delete($id) {
        if(DBConfig::isUseLocalDB()){
            LocalDBManager::delete(Tag::class, $id);
        } else {
            DB::sql("delete from tags where id=$id");
        }
    }

    public function tagExists($tag) {
        if(DBConfig::isUseLocalDB()){
            return count(LocalDBManager::getWhere(Tag::class, ['name', '=', $tag])) > 0;
        }
        return count(Tag::sql("select * from tags where name = '$tag'")) > 0;
    }

    public function getIds($tags){
        if(DBConfig::isUseLocalDB()){
            return LocalDBManager::getWhere(Tag::class, ['name', 'in', $tags]);
        }
        $formatted_tags = $this->_listToString($tags);
        return Tag::sql("select id from tags where name in ($formatted_tags)");
    }

    public function getByIds($tags_ids){
        if(DBConfig::isUseLocalDB()){
            return LocalDBManager::getWhere(Tag::class, ['id', 'in', $tags_ids]);
        } else {
            $ids = [];
            foreach($tags_ids as $tag_id){
                array_push($ids, $tag_id->tag_id);
            }
            $formatted_tags_ids = implode(',', $ids);
            return Tag::sql("select * from tags where id in ($formatted_tags_ids);");
        }
    }

    private function _listToString($list){
        return '\'' . implode("','", $list) . '\'';
    }
}
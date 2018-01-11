<?php

namespace App\Http\Repositories;


use App\Core\Common\Config\DBConfig;
use App\Core\Common\DB\DB;
use App\Core\Common\DB\LocalDBManager;
use App\Http\Models\Mail;

class MailRepository
{
    public function getAll() : array {
        if(DBConfig::isUseLocalDB()){
            return LocalDBManager::getAll(Mail::class);
        }
        return Mail::sql("select * from mails");
    }

    public function create($name, $email, $message) {
        if(DBConfig::isUseLocalDB()){
            $data = [
                'name' => $name,
                'email' => $email,
                'message' => $message
            ];
            LocalDBManager::insert(Mail::class, $data);
        } else {
            DB::sql("insert into mails values(null,'$name', '$email', '$message')");
        }
    }

    public function delete($id) {
        if(DBConfig::isUseLocalDB()){
            LocalDBManager::delete(Mail::class, $id);
        } else {
            DB::sql("delete from mails where id = $id");
        }
    }
}
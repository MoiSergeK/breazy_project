<?php

namespace App\Http\Repositories;


use App\Core\Common\Config\DBConfig;
use App\Core\Common\DB\DB;
use App\Core\Common\DB\LocalDBManager;
use App\Http\Models\User;

class UserRepository
{
    public function exists($login, $password) {
        if(DBConfig::isUseLocalDB()){
            return count(LocalDBManager::andWhere(User::class, [['login', '=', $login], ['password', '=', $password]])) > 0;
        }
        $sql = "select count(*) as users from users where login='$login' and password='$password';";
        $user = User::sql($sql);

        return $user[0]->users == 1;
    }

    public function update($searchKey='id', $data) {
        if(DBConfig::isUseLocalDB()){
            LocalDBManager::update(User::class, $searchKey, $data);
        } else {
            $sql = "update users set remember_token=".$data['remember_token']." where login=".$data['login'].";";
            DB::sql($sql);
        }
    }
}
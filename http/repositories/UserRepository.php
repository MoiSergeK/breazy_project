<?php

namespace App\Http\Repositories;


use App\Core\Common\Config\DBConfig;
use App\Core\Common\DB\LocalDBManager;
use App\Http\Models\User;

class UserRepository
{
    public function exists($login, $password) {
        if(DBConfig::isUseLocalDB()){
            return count(LocalDBManager::getWhere(User::class, ['name', '=', $tag])) > 0;
        }
        $sql = "select count(*) as users from users where login='$login' and password='$password';";
        $user = User::sql($sql);

        return $user[0]->users == 1;
    }
}
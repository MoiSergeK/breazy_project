<?php
/**
 * Created by PhpStorm.
 * User: igor-togo
 * Date: 25.07.2017
 * Time: 21:11
 */

namespace App\Http\Repositories;


use App\Core\Common\DB\DBConnector;

class ProjectRepository
{
    public function getAll() : array {
        $dbConnector = new DBConnector();
        $data = $dbConnector->exec("select * from cats");
        return [$data];
    }
}
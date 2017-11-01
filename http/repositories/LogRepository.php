<?php
/**
 * Created by PhpStorm.
 * User: igor-togo
 * Date: 21.10.2017
 * Time: 2:11
 */

namespace App\Http\Repositories;


use App\Core\Common\DB\DB;
use App\Http\Models\Log;

class LogRepository
{
    public function getAll() : array {
        return Log::sql("select * from logs;");
    }

    public function add($msg) {
        DB::sql("insert into logs values(null, '$msg', null);");
    }
}
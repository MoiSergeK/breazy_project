<?php
/**
 * Created by PhpStorm.
 * User: igor-togo
 * Date: 21.10.2017
 * Time: 2:11
 */

namespace App\Http\Repositories;


use App\Http\Models\Log;

class LogRepository
{
    public function getAll() : array {
        return Log::sql("select * from logs");
    }
}
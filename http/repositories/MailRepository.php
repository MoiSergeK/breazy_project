<?php
/**
 * Created by PhpStorm.
 * User: igor-togo
 * Date: 24.12.2017
 * Time: 20:30
 */

namespace App\Http\Repositories;


use App\Core\Common\DB\DB;
use App\Http\Models\Mail;

class MailRepository
{
    public function getAll() : array {
        return Mail::sql("select * from mails");
    }

    public function add($name, $email, $message) {
        DB::sql("insert into mails values(null,'$name', '$email', '$message')");
    }

    public function delete($id) {
        DB::sql("delete from mails where id = $id");
    }
}
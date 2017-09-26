<?php
/**
 * Created by PhpStorm.
 * User: igor-togo
 * Date: 09.09.2017
 * Time: 2:33
 */

namespace App\Http\Repositories;


class UnitOfWork
{
    public $project_tag;
    public $projects;
    public $tags;

    public function __construct()
    {
        $this->projects = new ProjectRepository();
        $this->project_tag = new ProjectTagRepository();
        $this->tags = new TagRepository();
    }
}
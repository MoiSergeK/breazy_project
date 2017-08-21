<?php

namespace App\Core\Template_Engine;

use App\Core\Common\SysPathsManager;

class BreazyInit
{
    public function parse(string $view_name, array $args = null) : string {
        $view_content = SysPathsManager::getView("$view_name.breazy.php");

        $templateSimplifier = new TemplateSimplifier();
        $templateSimplifier->simplify($view_content, $args);

        $constructionsSimplifier = new ConstructionsSimplifier();
        $constructionsSimplifier->simplify($view_content);

        return $view_content;
    }
}
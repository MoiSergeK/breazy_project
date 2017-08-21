<?php
/**
 * Created by PhpStorm.
 * User: igor-togo
 * Date: 24.07.2017
 * Time: 19:30
 */

namespace App\Core\Template_Engine;


class ConstructionsSimplifier
{
    public function simplify(&$view_content){
        $this->simplifyIfConstructions($view_content);
        $matches = null;
        preg_match_all('/@for\([\s\S]*}/', $view_content, $matches);
        if(count($matches[0]) > 0){
            $match = $matches[0][0];
            $splitCycleBody = $this->splitCycleBody($match);
            $newCycleBody = implode('', $splitCycleBody);
            $content = '';
            eval($newCycleBody);
            $view_content = str_replace($match, $content, $view_content);
        }
    }

    private function splitCycleBody(string $cycleBody){
        $splitCycleBody = [];
        $index_start = strpos($cycleBody, "{") + 1;
        $index_end = strripos($cycleBody, "}");
        $splitCycleBody['head'] = substr($cycleBody, 1, $index_start-1) . "\$content .= \"";
        $splitCycleBody['body'] = str_replace('"', '\"', trim(substr($cycleBody, $index_start, $index_end - $index_start)));
        $splitCycleBody['tail'] = "\";}";
        return $splitCycleBody;
    }

    private function simplifyIfConstructions(&$view_content){
        $matches = null;
        preg_match_all('/@if\([\s\S]*}/', $view_content, $matches);

        foreach($matches[0] as $match){
            $ifStatementParts = [];
            $index_start = strpos($match, "{") + 1;
            $index_end = strripos($match, "}");
            $ifStatementParts['head'] = substr($match, 1, $index_start-1) . "\$content = \"";
            $ifStatementParts['body'] = str_replace('"', '\"', trim(substr($match, $index_start, $index_end - $index_start)));
            $ifStatementParts['tail'] = "\";}";
            $newIfBody = implode('', $ifStatementParts);
            $content = '';
            eval($newIfBody);
            $view_content = str_replace($match, $content, $view_content);
        }
    }
}
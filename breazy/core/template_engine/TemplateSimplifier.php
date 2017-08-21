<?php
/**
 * Created by PhpStorm.
 * User: igor-togo
 * Date: 23.07.2017
 * Time: 3:45
 */

namespace App\Core\Template_Engine;


use App\Core\Common\SysFileManager;
use App\Core\Common\SysPathsHolder;
use App\Core\Common\SysPathsManager;

class TemplateSimplifier
{
    public function simplify(&$view_content, &$args) {
        $this->simplifyTemplateExtention($view_content);

        $this->insertScripts($view_content);
        $this->insertStyles($view_content);
        $this->insertImages($view_content);
        $this->insertVariables($view_content, $args);
    }

    private function simplifyTemplateExtention(&$view_content) {
        $matches = $this->findMatches($view_content, 'extends')[0];
        if(count($matches) > 0){
            $view_name = $this->_getAssetName($matches);
            $view_content = str_replace($matches, '', $view_content);
            $super_view = SysPathsManager::getView("$view_name.breazy.php");
            $super_view = str_replace("@__CONTENT__", $view_content, $super_view);
            $view_content = $super_view;
        }
    }

    public function insertScripts(&$view_content) {
        $matches = $this->findMatches($view_content, 'script');
        foreach($matches as $match){
            $asset_names = explode(',', $this->_getAssetName($match));
            $include_style_str = '';
            foreach($asset_names as $asset_name) {
                $asset_name = trim($asset_name);
                $asset_path = "breazy/http/public/static/js/$asset_name.js";
                $include_style_str .= "<script src=\"$asset_path\"></script>\n";
            }
            $view_content = str_replace($match, $include_style_str, $view_content);
        }
    }

    public function insertStyles(&$view_content) {
        $matches = $this->findMatches($view_content, 'style');
        foreach($matches as $match){
            $asset_names = explode(',', $this->_getAssetName($match));
            $include_style_str = '';
            foreach($asset_names as $asset_name){
                $asset_name = trim($asset_name);
                $asset_path = "breazy/http/public/static/css/$asset_name.css";
                $include_style_str .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"$asset_path\">\n";
            }
            $view_content = str_replace($match, $include_style_str, $view_content);
        }
    }

    public function insertImages(&$view_content) {
        $matches = $this->findMatches($view_content, 'img');
        foreach($matches as $match){
            $asset_name = $this->_getAssetName($match);
            $asset_path = "breazy/http/public/static/img/$asset_name";
            $data = "<img src=\"$asset_path\" class=\"full-width\">";
            $view_content = str_replace($match, $data, $view_content);
        }
    }

    private function _getAssetName($match){
        $index_start = strpos($match, "(") + 1;
        $index_end = strripos($match, ")");
        return substr($match, $index_start, $index_end - $index_start);
    }

    public function insertVariables(&$view_content, &$args) {
        if(count($args) > 0){
            foreach($args as $arg_name => $arg_value){
                $view_content = str_replace("@$arg_name", $arg_value, $view_content);
            }
        }
    }

    private function findMatches(&$view_content, $match) : array {
        $matches = null;
        preg_match_all('/@' . $match . '\(.+\)/', $view_content, $matches);
        return $matches[0];
    }
}
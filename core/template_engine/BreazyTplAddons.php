<?php

namespace App\Core\Template_Engine;


trait BreazyTplAddons
{
    public function img($asset, $params = null){
        $asset_params = '';
        if($params !== null){
            foreach($params as $key => $value){
                $asset_params .= "$key=\"$value\" ";
            }
        }
        echo "<img src=\"public/files/img/$asset\" $asset_params>";
    }

    public function style(){
        foreach (func_get_args() as $asset)
            echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"public/assets/css/$asset.css\">\n";
    }

    public function script(){
        foreach (func_get_args() as $asset)
            echo "<script src=\"public/assets/js/$asset.js\"></script>\n";
    }
}
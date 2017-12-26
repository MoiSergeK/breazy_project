<?php

namespace App\Core\Common\Sys;

class File
{
    const IMG = 'img';
    const DOC = 'doc';

    public static function upload($file_path, $file_name, $file_type) : string{
        $file_extension = explode('.', $file_name)[1];
        $full_file_name = md5(bin2hex(random_bytes(5))) . ".$file_extension";
        $file_content = file_get_contents($file_path);
        $fin = fopen(Path::getFilesPath(File::IMG) . "/$full_file_name", 'w');
        fwrite($fin, $file_content);
        fclose($fin);
        return $full_file_name;
    }

    public static function delete($file_name, $file_type){
        $file_path = Path::getFilePath($file_name, $file_type);
        unlink($file_path);
    }

    public static function getView($view_name){
        /*$split_path = explode('/', $path, 1);
        $file_name = $split_path[count($split_path) - 1];
        unset($split_path[count($split_path) - 1]);
        $file_path = implode('/', $split_path);
        $full_views_path = SysPathsHolder::VIEWS_PATH() . "/$file_path";
        $files = scandir($full_views_path);
        foreach($files as $file){
            $split_file_name = explode('.', $file);
            if($split_file_name[0] === $file_name){
                return file_get_contents($full_views_path . "/$file");
            }
        }
        return 'No such file or directory!';*/
        return file_get_contents(Path::getViewPath($view_name));
    }

    public static function getConfig($to_array = false){
        return yaml_parse_file(Path::getConfigPath());
    }

    public static function getRoutes($to_array = false){
        return yaml_parse_file(Path::getRoutesPath());
    }
}
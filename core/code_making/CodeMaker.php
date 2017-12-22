<?php
namespace App\Core\CodeMaking;


use App\Core\Common\Path;

class CodeMaker
{
    private static function cut($args, $shift = 1){
        return array_slice($args, $shift);
    }

    public static function makeController($args){
        $controllerName = ucfirst($args[0]) . 'Controller';
        $controllerParts = self::_getControllerParts(self::cut($args));
        $header = "<?php\n\nnamespace App\Http\Controllers;\n\n";
        $controllerBody = $header . "class $controllerName\n{\n$controllerParts}";
        file_put_contents("http/controllers/$controllerName.php", $controllerBody);
    }

    private static function _getControllerParts($args){
        $fields = [];
        $funcs = [];
        foreach($args as $arg){
            $splited = explode(':', $arg);
            if($splited[0] == 'f'){
                $funcs[] = "\n\tpublic function " . $splited[1] . "()\n\t{\n\n\t}\n";
            }
            else if($splited[0] == 'f'){
                $fields[] = "\tprivate \$_" . $splited[1] . ";\n";
            }
        }
        $content = '';
        foreach ($fields as $field){
            $content .= $field;
        }
        foreach ($funcs as $func){
            $content .= $func;
        }
        return $content;
    }

    public static function makeModel($args){
        $modelName = ucfirst($args[0]);
        $modelParts = self::_getModelParts(self::cut($args));
        $header = "<?php\n\nnamespace App\Http\Models;;\n\nuse App\Core\Common\DB\Model;\n\n";
        $modelBody = $header . "class $modelName extends Model\n{\n$modelParts\n}";
        file_put_contents("http/models/$modelName.php", $modelBody);
    }

    private static function _getModelParts($args){
        $fields = [];
        $methods = [];

        foreach($args as $arg){
            $fields[] = "\tprivate \$_$arg;";
            $methods[] = "\n\n\tpublic function set" . ucfirst($arg) . "(\$value){\n\t\t\$this->_arg = \$value;\n\t}\n";
            $methods[] = "\n\tpublic function get" . ucfirst($arg) . "(){\n\t\treturn \$this->_arg;\n\t}";
        }

        $content = '';

        foreach($fields as $field){
            $content .= $field . "\n";
        }
        foreach($methods as $method){
            $content .= $method;
        }

        return $content;
    }

    public static function makeRoute($args){
        $routes = yaml_parse_file(Path::getRoutesPath());
        $routes[$args[0]] = ucfirst($args[1]) . 'Controller::' . $args[2];
        file_put_contents('config/routes.yml', $routes);
    }

    public static function makeMigration()
    {
        $content = "<?php\n\n";
        $content .= "class Migration" . date('smHmdY') . "\n{\n";
        $content .= "\tpublic function up(){\n\n\t}\n";
        $content .= "\tpublic function down(){\n\n\t}\n";
        $content .= "}";
        file_put_contents('http/migrations/Migration_' . date("smHmdY") . '.php', $content);
    }
}
<?php

namespace App\Core\Template_Engine;

use App\Core\Common\File;
use App\Core\Common\Path;

class BreazyTpl
{
    use BreazyTplAddons;

    private $_view_name;

    private $vars = array();

    private $_extended = false;

    public function __construct($view_name, $args)
    {
        $this->_view_name = $view_name . '.breazy.php';
        if($args != null)
            $this->attach($args);
    }

    public function __get( $name ){
        if( isset($this->vars[$name]) )
            return $this->vars[$name];
        else{
            return null;
        }
    }

    public function __set( $name,$value ){
        $this->vars[$name] = $value;
    }

    public function render($vars = array() ) {
        ob_start();
        $this->show($vars );
        return ob_get_clean();
    }

    private function show($vars = array() ) {
        extract($this->vars);
        $this->exec(File::getView($this->_view_name));
    }

    private function exec($page_content) {;
        eval('?>' . $page_content);
    }

    private function attach($var, $val='' ) {
        if( is_scalar($var) )
            $this->vars[$var] = $val;
        else
            $this->vars = array_merge($this->vars,$var);
    }

    public function extends_layout($layout){
        if(!$this->_extended) {
            $layout_name = Path::getViewPath($layout . '.breazy.php');
            $page = str_replace('__CONTENT__', File::getView($this->_view_name), file_get_contents($layout_name));
            $this->_extended = true;
            $this->exec($page);
            die();
        }
    }

    public function render_partial($view){
        $this->exec(File::getView($view));
    }
}
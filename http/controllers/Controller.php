<?php

namespace App\Http\Controllers;

use App\Core\Common\Routing\Request;
use App\Core\Template_Engine\BreazyTpl;
use App\Http\Repositories\UnitOfWork;

abstract class Controller
{
    use Request;

    protected $_unitOfWork;

    public function __construct()
    {
        $this->_unitOfWork = new UnitOfWork();
    }

    protected function view( string $view_name, array $args = null ) : string {
        return ( new BreazyTpl( $view_name, $args ) ) -> render();
    }
}
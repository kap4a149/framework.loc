<?php
namespace application\core;

use application\core\View;

abstract class Controller{

    public $route;
    public $view;

    public function __construct($route){
    //path thransfer to extended classes
        $this->route = $route;
        $this->view = new View($route);
    }
}

?>
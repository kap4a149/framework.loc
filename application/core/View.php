<?php
namespace application\core;

class View{
    public $path;
    public $route;
    public $layout= 'default';
    
    
    public function __construct($route){
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    public function render($title, $vars=[]){
        //this function enable bufering
        ob_start();
        if(file_exists('application/views/' . $this->path . '.php')){
        require 'application/views/' . $this->path . '.php';
        $content = ob_get_clean();
        require 'application/views/layouts/' . $this->layout . '.php';
        }
        else{
            echo 'View not found' . $this->path;
        }
    }

    public static function errorCode($code){
        http_response_code($code);
        require 'application/views/errors/' . $code . '.php';
        exit;
    }

    public function redirect($url){
        header('location:' . $url);
        exit();
    }
}
?>
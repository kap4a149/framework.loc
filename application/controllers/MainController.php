<?php
namespace application\controllers;
use application\core\Controller;

class MainController extends Controller{
    public function IndexAction(){
        $this->view->render('Main page');
    }
}
?>
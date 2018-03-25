<?php
namespace application\controllers;
use application\core\Controller;
class AccountController extends Controller{

    //This method request Login page
    public function loginAction(){
        $this->view->render('Login');
    }

    //This method request register page
    public function registerAction(){
        $this->view->render('Password');
    }
}
?>
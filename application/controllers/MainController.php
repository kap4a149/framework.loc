<?php
namespace application\controllers;
use application\core\Controller;
use application\lib\Db;

class MainController extends Controller{

    public function IndexAction(){
        $db = new Db;


        $params =[
            'id' => 1,
        ];

        // :id = protection from sql injection
        $data = $db->row('SELECT * FROM DEPARTMENTS where id = :id', $params);
        debug($data);


        $this->view->render('Main page');
    }
}
?>
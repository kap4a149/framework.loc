<?php
namespace application\lib;
use PDO;
class Db{

    protected $db;

    public function __construct(){
        $config = require 'application/config/db.php';
        $this->db = new PDO("mysql:host=".$config['host'].";dbname=".$config['name'], $config['user'], $config['password']);
    }

    //protection from Sql injection
    public function query($sql, $params= []){
        $stmt = $this->db->prepare($sql);
        if(!empty($params)){
            foreach ($params as $k => $v){
                $stmt->bindValue(':'.$k, $v);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    
    public function row($sql, $params=[]){
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //Return column
    public function column($sql, $params = []){
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }
}
?>
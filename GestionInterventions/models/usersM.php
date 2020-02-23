<?php

//include_once('connection.php');
require_once API.DS.'dataBase.php';
require_once API.DS.'ModelePersonnel.php';
require_once MODELS.DS.'ConnexionDB.php';

class UsersModel
{
    
    private $db;
    private $log;

    public function __construct()
    {
         $this->db = new Database();
         $this->db = $this->db->connect();      
        
         // $this->db = new connection();
        // $this->db = $this->db->dbConnect();
    }

    public function Login($name, $pass)
    {
        $p = new ModelePersonnel($this->db);
        return  $p->check_conn($name, $pass); 

    }
    
    public function oublier($email)
    {
        $p = new ModelePersonnel($this->db);
        return  $p-> get_pass($email);
    }

    public function changement($code, $pass)
    {
        $c= new ConnexionDB();
        $con= $c->connect();
        $p = new ModelePersonnel($con);
        return $p->changer($code,$pass);

    }
}
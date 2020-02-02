<?php

//include_once('connection.php');
include_once('../Api/DataBase.php');
include_once('../Api/ModelePersonnel.php');
include_once('../Modele/ConnexionDB.php');

class users
{
    private $spa = "SPA2";
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
        $this->log = new ModelePersonnel($this->db);
        $this->log = $this->log->check_conn($name, $pass); 

    }
    
    public function oublier($email)
    {
        $this->log = new ModelePersonnel($this->db);
        $this->log = $this->log-> get_pass($email);
    }

    public function changement($code, $pass)
    {
        $c= new ConnexionDB();
        $con= $c->connect();
        $this->log = new ModelePersonnel($con);
        $this->log = $this->log-> changer($code,$pass);

    }
}
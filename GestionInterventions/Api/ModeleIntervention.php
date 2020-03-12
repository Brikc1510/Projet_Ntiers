<?php
require_once dirname(__FILE__).'/dataBase.php';

    function get_type_intervention()
    {
        $m=new DataBase();
        $con= $m->connect();
        $exe = $con->prepare('SELECT TI_CODE FROM type_intervention');
        
        $exe->execute();
        $Liste = array(); 
        
        $result =$exe->fetchAll(PDO::FETCH_OBJ);
        //header('Content-Type: application/json');
         echo json_encode($result, JSON_PRETTY_PRINT);
       
        //return $Liste;

    } 
    get_type_intervention();


?>
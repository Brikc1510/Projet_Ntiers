<?php

/* class ModeleVehicule
{
    private $con;


    function __construct($con)
    {
        $this->con =$con;
    } */
    require_once dirname(__FILE__).'/dataBase.php';
    function get_type_vehicule()
    {
        $m=new DataBase();
        $con= $m->connect();
        $Liste = array();
        $exe = $con->prepare('SELECT DISTINCT TV_CODE FROM vehicule WHERE VP_ID="OP"');
        
        $exe->execute();
       
        
       

        while($result = $exe->fetch(PDO::FETCH_OBJ)) {
    
            $row=array("TV_CODE" => $result->TV_CODE);
            array_push($Liste,$row);
    
        }
    
        echo json_encode($Liste);

    }
    

    function get_mat_vehicule($type)
    {
        $m=new DataBase();
        $con= $m->connect();
        $Liste = array();
        $exe = $con->prepare('SELECT V_IMMATRICULATION FROM vehicule WHERE TV_CODE=?');
        $exe->bindParam(1, $type);
        $exe->execute();
       
        
       

        while($result = $exe->fetch(PDO::FETCH_OBJ)) {
    
            $row=array("V_IMMATRICULATION" => $result->V_IMMATRICULATION);
            array_push($Liste,$row);
    
        }
    
        echo json_encode($Liste);

    }

    function get_id_vehicule($mat)
    {
        $m=new DataBase();
        $con= $m->connect();
        $exe = $con->prepare('SELECT V_ID FROM vehicule WHERE V_IMMATRICULATION=?');
        $exe->bindParam(1, $mat);
        $exe->execute();
       
        
       

        while($result = $exe->fetch(PDO::FETCH_OBJ)) {
    
            $row=array("V_ID" => $result->V_ID);
            
    
        }
    
        echo json_encode($row);

    }

    function get_type_vehicule_role($code)
    {
        $m=new DataBase();
        $con= $m->connect();
        $Liste = array();
        $exe = $con->prepare('SELECT ROLE_NAME FROM type_vehicule_role where TV_CODE=?');
        $exe->bindParam(1, $code);
        $exe->execute();
       
        
       

        while($result = $exe->fetch(PDO::FETCH_OBJ)) {
    
           
            $row=array("ROLE_NAME" => $result->ROLE_NAME);
            array_push($Liste,$row);
    
        }
    
        echo json_encode($Liste);
        
    }

    if(!empty($_GET['code']))
    {
        $code=$_GET['code'];
        get_mat_vehicule($code);
    }
    else
    {
        if(!empty($_GET['role']))
        {
            $role=$_GET['role'];
            get_type_vehicule_role($role);
        }
        else
        {
            if(!empty($_GET['id']))
            {
                $id=$_GET['id'];
                get_id_vehicule($id);
            }
            else
            {
                get_type_vehicule();
            }
           
        }
    }
    

?>
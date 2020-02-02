<?php

class ModeleVehicule
{
    private $con;


    function __construct($con)
    {
        $this->con =$con;
    }

    function get_type_vehicule()
    {
        $Liste = array();
        $exe = $this->con->prepare('SELECT DISTINCT TV_CODE FROM vehicule WHERE VP_ID="OP"');
        
        $exe->execute();
       
        
       

        while($result = $exe->fetch(PDO::FETCH_OBJ)) {
    
            $row=array("TV_CODE" => $result->TV_CODE);
            array_push($Liste,$row);
    
        }
    
        return $Liste;

    }

    function get_mat_vehicule($type)
    {
        $Liste = array();
        $exe = $this->con->prepare('SELECT V_IMMATRICULATION FROM vehicule WHERE TV_CODE=?');
        $exe->bindParam(1, $type);
        $exe->execute();
       
        
       

        while($result = $exe->fetch(PDO::FETCH_OBJ)) {
    
            $row=array("V_IMMATRICULATION" => $result->V_IMMATRICULATION);
            array_push($Liste,$row);
    
        }
    
        return $Liste;

    }

    function get_id_vehicule($mat)
    {
       
        $exe = $this->con->prepare('SELECT V_ID FROM vehicule WHERE V_IMMATRICULATION=?');
        $exe->bindParam(1, $mat);
        $exe->execute();
       
        
       

        while($result = $exe->fetch(PDO::FETCH_OBJ)) {
    
            $row=array("V_ID" => $result->V_ID);
            
    
        }
    
        return $row;

    }

    function get_type_vehicule_role($code)
    {
        $Liste = array();
        $exe = $this->con->prepare('SELECT ROLE_NAME FROM type_vehicule_role where TV_CODE=?');
        $exe->bindParam(1, $code);
        $exe->execute();
       
        
       

        while($result = $exe->fetch(PDO::FETCH_OBJ)) {
    
           
            $row=array("ROLE_NAME" => $result->ROLE_NAME);
            array_push($Liste,$row);
    
        }
    
        return $Liste;
        
    }
}

?>
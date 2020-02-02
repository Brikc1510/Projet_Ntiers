<?php

class ModeleIntervention
{
    private $con;


    function __construct($con)
    {
        $this->con =$con;
    }

    function get_type_intervention()
    {
        $exe = $this->con->prepare('SELECT TI_CODE FROM type_intervention');
        
        $exe->execute();
        $Liste = array(); 
        
        while($result = $exe->fetch(PDO::FETCH_OBJ)) {
    
            $row=array("TI_CODE" => $result->TI_CODE);
            array_push($Liste,$row);
    
        }
    
         
    
        return $Liste;
    }
}

?>
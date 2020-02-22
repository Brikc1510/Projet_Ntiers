<?php
include_once 'ConnexionDB.php';
class GestionVehicule
{
    public $con;

    function __construct()
    {
        $c =new ConnexionDB();
        $this->con =$c->connect();
    }

    function ajouterVehicule($i,$idI)
    {
        try{
			
		
        $query = 'INSERT INTO vehicules
        SET
        V_ID= :V_ID,
        ID= :ID,
        TV_CODE= :TV_CODE,
        dateDepart= :dateDepart,
        heureDepart= :heureDepart,
        dateArrivee= :dateArrivee,
        heureArrivee= :heureArrivee,
        dateRetour= :dateRetour,
        heureRetour= :heureRetour';

        
       
        $exe = $this->con->prepare($query);
        $hD =$i->heureD.':00';
        $hA =$i->heureA.':00';
        $hR =$i->heureR.':00';

       
        $exe->bindParam(':V_ID', $i->id);
        $exe->bindParam(':ID', $idI);
        $exe->bindParam(':TV_CODE', $i->typeV);
        $exe->bindParam(':dateDepart', $i->dateD);
        $exe->bindParam(':heureDepart', $hD);
        $exe->bindParam(':dateArrivee', $i->dateA);
        $exe->bindParam(':heureArrivee', $hA);
        $exe->bindParam(':dateRetour', $i->dateR);
        $exe->bindParam(':heureRetour', $hR);
        

        if($exe->execute())
        {
            echo 'done';
        }
        else
        {
            print_r($exe->errorInfo());
            echo 'error';
        }

    }
    catch(Exception $e) {

    echo $e->getMessage();
    }
            
    }
}
?>
<?php
include_once 'ConnexionDB.php';
class GestionIntervention
{
    public $con;

    function __construct()
    {
        $c =new ConnexionDB();
        $this->con =$c->connect();
    }

    function ajouterIntervention($i,$d)
    {
        try{
			
		
        $query = 'INSERT INTO interventions
        SET
        
        commune= :commune,
        adresse= :adresse,
        typeI= :typeI,
        requerant= :requerant,
        dateDebut= :dateDebut,
        heureDebut= :heureDebut,
        dateFin= :dateFin,
        heureFin= :heureFin,
        opm= :opm,
        important= :important,
        V_ID= :V_ID,
        dateDepart= :dateDepart,
        heureDepart= :heureDepart,
        dateArrivee= :dateArrivee,
        heureArrivee= :heureArrivee,
        dateRetour= :dateRetour,
        heureRetour= :heureRetour,
        responsable= :responsable';
        
       
        $exe = $this->con->prepare($query);
        $hD =$i->heureD.':00';
     
        $hF =$i->heureF.':00';
        //$exe->bindParam(':id', $i->id);
        $exe->bindParam(':commune', $i->commune);
        $exe->bindParam(':adresse', $i->adresse);
        $exe->bindParam(':typeI', $i->typeI);
        $exe->bindParam(':requerant', $i->requerant);
        $exe->bindParam(':dateDebut', $i->dateD);
        $exe->bindParam(':dateFin', $i->dateF);
        $exe->bindParam(':heureDebut', $hD);
        $exe->bindParam(':heureFin', $hF);
        $exe->bindParam(':opm', $i->opm);
        $exe->bindParam(':important', $i->impor);
        $exe->bindParam(':V_ID',  $d);
        $exe->bindParam(':dateDepart', $i->dateD);
        $exe->bindParam(':heureDepart', $hD);
        $exe->bindParam(':dateArrivee', $i->dateD);
        $exe->bindParam(':heureArrivee', $hD);
        $exe->bindParam(':dateRetour', $i->dateD);
        $exe->bindParam(':heureRetour', $hD);
        $exe->bindParam(':responsable', $i->resp);

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
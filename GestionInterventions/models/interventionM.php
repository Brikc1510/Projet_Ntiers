<?php

class InterventionModel {

    public function construct(){}

    public function listAll(){
        $sql='SELECT p.nom, p.prenom, i.commune, i.adresse, i.typeI, i.requerant, i.dateDebut, i.heureDebut, i.dateFin, i.heureFin, i.opm,
        i.important, i.responsable, v.TV_CODE, i.dateDepart, i.heureDepart,i.dateArrivee, i.heureArrivee, i.dateRetour, i.heureRetour
        FROM personne p
        INNER JOIN voyager vo ON p.P_CODE=vo.P_CODE
        INNER JOIN vehicules v ON vo.TV_CODE=v.TV_CODE
        INNER JOIN participer pa ON v.TV_CODE=pa.TV_CODE
        INNER JOIN interventions i ON pa.id=i.id';
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=uha-2020-gr5;charset=utf8', 'root', '1234');
            $stmt=$dbh->prepare($sql);
            $res=($stmt->execute())?$stmt->fetchAll(PDO::FETCH_OBJ): null;
            $dbh = null;
            return $res;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }


    public function listOne($id){
        $sql='SELECT p.nom, p.prenom, i.commune, i.adresse, i.typeI, i.requerant, i.dateDebut, i.heureDebut, i.dateFin, i.heureFin, i.opm,
        i.important, i.responsable, v.TV_CODE, i.dateDepart, i.heureDepart,i.dateArrivee, i.heureArrivee, i.dateRetour, i.heureRetour
        FROM personne p
        INNER JOIN voyager vo ON p.P_CODE=vo.P_CODE
        INNER JOIN vehicules v ON vo.TV_CODE=v.TV_CODE
        INNER JOIN participer pa ON v.TV_CODE=pa.TV_CODE
        INNER JOIN interventions i ON pa.id=i.id   
        WHERE i.id=:id';
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=uha-2020-gr5;charset=utf8', 'root', '1234');
            $stmt=$dbh->prepare($sql);
            $stmt->bindParam(":id",$id);
            $res=($stmt->execute())?$stmt->fetchAll(PDO::FETCH_OBJ): null;
            $dbh = null;
            return current($res);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function ajouterIntervention($i)
    {
        try{
			
        $dbh = new PDO('mysql:host=localhost;dbname=uha-2020-gr5;charset=utf8', 'root', '1234');
        $query = 'INSERT INTO interventions
        SET
        id= :id,
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
        dateDepart= :dateDepart,
        heureDepart= :heureDepart,
        dateArrivee= :dateArrivee,
        heureArrivee= :heureArrivee,
        dateRetour= :dateRetour,
        heureRetour= :heureRetour,
        responsable= :responsable';
        
       
        $exe = $dbh->prepare($query);
        $hD =$i->heureD.':00';
     
        $hF =$i->heureF.':00';
        $exe->bindParam(':id', $i->id);
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
        $exe->bindParam(':dateDepart', $i->dateD);
        $exe->bindParam(':heureDepart', $hD);
        $exe->bindParam(':dateArrivee', $i->dateD);
        $exe->bindParam(':heureArrivee', $hD);
        $exe->bindParam(':dateRetour', $i->dateD);
        $exe->bindParam(':heureRetour', $hD);
        $exe->bindParam(':responsable', $i->resp);

        if($exe->execute())
        {
            

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
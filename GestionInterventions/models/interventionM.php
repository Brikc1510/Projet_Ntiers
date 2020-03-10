<?php

class InterventionModel {

    public function construct(){}

    public function listAllParticipation(){
        session_start();
        $sql='SELECT DISTINCT i.id,i.commune, i.adresse, i.typeI, i.requerant, i.dateDebut, i.heureDebut, i.dateFin, i.heureFin, 
         i.responsable, v.TV_CODE
        FROM interventions i 
        INNER JOIN personne p ON p.P_CODE=?
        INNER JOIN vehicules v ON v.ID=i.id AND v.V_ID=p.v_ID where etat="Validée"';

        
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=uha-2020-gr5;charset=utf8', 'root', '1234');
            $stmt=$dbh->prepare($sql);
            $stmt->bindParam(1,$_SESSION["user"]);
            $res=($stmt->execute())?$stmt->fetchAll(PDO::FETCH_OBJ): null;
            $dbh = null;
            return $res;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function valider($id)
    {
        $sql='update interventions SET etat="Validée" where id=?';
       
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=uha-2020-gr5;charset=utf8', 'root', '1234');
            $stmt=$dbh->prepare($sql);
           
            $stmt->bindParam(1,$id);
            $res=($stmt->execute())?$stmt->fetchAll(PDO::FETCH_OBJ): null;
            $dbh = null;
            return current($res);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function listeInterAvalider()
    {
        session_start();
        $sql='SELECT *
        FROM interventions 
        WHERE responsable=:id AND etat ="aValider"';
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=uha-2020-gr5;charset=utf8', 'root', '1234');
            $stmt=$dbh->prepare($sql);
            $stmt->bindParam(":id",$_SESSION['user']);
            $res=($stmt->execute())?$stmt->fetchAll(PDO::FETCH_OBJ): null;
           
            $dbh = null;
            return $res;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }


    public function listOne($id){
        $sql='SELECT i.id ,i.commune, i.adresse, i.typeI, i.requerant, i.dateDebut, i.heureDebut, i.dateFin, i.heureFin, i.opm,
        i.important, i.responsable, v.dateDepart, v.heureDepart,v.dateArrivee, v.heureArrivee, v.dateRetour, v.heureRetour
        FROM interventions i
        INNER JOIN vehicules v ON v.ID=i.id
        WHERE i.id=:id';
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=uha-2020-gr5;charset=utf8', 'root', '1234');
            $stmt=$dbh->prepare($sql);
            $stmt->bindParam(":id",$id);
            $res=($stmt->execute())?$stmt->fetchAll(PDO::FETCH_OBJ): null;
            $dbh = null;
            var_dump($res);
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
        responsable= :responsable,
        idChef = :idChef,
        etat= :etat';
        
        $etat = "aValider";
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
        $exe->bindParam(':responsable', $i->resp);
        $exe->bindParam(':idChef',$i->idChef );
        $exe->bindParam(':etat',$etat );


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
    public function exporter()
    {
        $dbh = new PDO('mysql:host=localhost;dbname=uha-2020-gr5;charset=utf8', 'root', '1234');
        $sql = "SELECT * FROM interventions";

        //Prepare our SQL query.
        $statement = $dbh->prepare($sql);

        //Executre our SQL query.
        $statement->execute();

        //Fetch all of the rows from our MySQL table.
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

        //Get the column names.
        $columnNames = array();
        if(!empty($rows)){
        //We only need to loop through the first row of our result
        //in order to collate the column names.
        $firstRow = $rows[0];
            foreach($firstRow as $colName => $val){
                $columnNames[] = $colName;
            }
        }   

        //Setup the filename that our CSV will have when it is downloaded.
        $fileName = 'mysql-export.csv';

        //Set the Content-Type and Content-Disposition headers to force the download.
        header('Content-Type: application/excel');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');

        //Open up a file pointer
        $fp = fopen('php://output', 'w');

        //Start off by writing the column names to the file.
        fputcsv($fp, $columnNames);

        //Then, loop through the rows and write them to the CSV file.
        foreach ($rows as $row) {
            fputcsv($fp, $row);
        }

        //Close the file pointer.
        fclose($fp);
        }


}
?>
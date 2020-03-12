<?php

class InterventionModel {

   
    public function construct(){}

    public function listAllParticipation(){
        if(session_status() !== PHP_SESSION_ACTIVE)
        session_start();
        $dbh = new PDO('mysql:host=localhost;dbname=uha-2020-gr5;charset=utf8', 'root', '1234');
            
        switch($_SESSION['GP_ID'])
            {
                case 0:
                    $sql = 'SELECT DISTINCT * from interventions as i 
                    INNER JOIN personne p ON p.P_CODE=?
                    INNER JOIN vehicules v ON v.ID=i.id AND v.V_ID=p.v_ID where etat="Validee"';
                    $stmt=$dbh->prepare($sql);
                    $stmt->bindParam(1,$_SESSION['user']);
                   
                break;

                case 2:
                    $sql = 'SELECT * from interventions as i
                    INNER JOIN vehicules v ON v.ID=i.id  
                     where idChef=?';
                    $stmt=$dbh->prepare($sql);
                    $stmt->bindParam(1,$_SESSION['user']);
                   
                break;

                case 3:
                    $sql = 'SELECT * from interventions  as i
                    INNER JOIN vehicules v ON v.ID=i.id
                    where responsable=?';
                    $stmt=$dbh->prepare($sql);
                    $stmt->bindParam(1,$_SESSION['user']);
                break;

                case 4:
                    $sql = 'SELECT * from interventions as i
                    INNER JOIN vehicules v ON v.ID=i.id';
                    $stmt=$dbh->prepare($sql);
                    $stmt->bindParam(1,$_SESSION['user']);
                break;

                
                
            }    
       

        
        try {
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
        $sql='UPDATE interventions SET etat="Validee" where id=?';
       
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
    public function modifierInter($id,$idChef,$resp,$c,$adresse,$typeI,$requerant,$dateDebut,$heureDebut,$dateFin,$heureFin,$opm,$important,$dateDepart,$heureDepart,$dateArrivee,$heureArrivee,$dateRetour,$heureRetour)
    {
        $dbh = new PDO('mysql:host=localhost;dbname=uha-2020-gr5;charset=utf8', 'root', '1234');
       
        $sql= 'UPDATE interventions 
        SET 
        commune=:commune,
        adresse=:adresse,
        typeI=:typeI,
        requerant=:requerant,
        dateDebut=:dateDebut,
        heureDebut=:heureDebut,
        dateFin=:dateFin,
        heureFin=:heureFin,
        opm=:opm,
        important=:important,
        responsable=:responsable,
        idChef=:idChef,
        etat=:etat,
        commentaire=:commentaire
        where id=:id';

         $sql1='UPDATE vehicules 
         SET 
         dateDepart= :dateDepart,
        heureDepart= :heureDepart,
        dateArrivee= :dateArrivee,
        heureArrivee= :heureArrivee,
        dateRetour= :dateRetour,
        heureRetour= :heureRetour
          where ID=:id';
       
        try {
           
            $exe=$dbh->prepare($sql);
            $etat = "aValider";
            $commentaire = null;
            $hD =$heureDebut;
            $hF =$heureFin;
            echo $hD;
            echo $hF;
            echo $dateDebut;
            echo $dateFin;
     
           
            $exe->bindParam(':commune', $c);
            $exe->bindParam(':adresse', $adresse);
            $exe->bindParam(':typeI', $typeI);
            $exe->bindParam(':requerant', $requerant);
            $exe->bindParam(':dateDebut', $dateDebut);
            $exe->bindParam(':dateFin', $dateFin);
            $exe->bindParam(':heureDebut', $hD);
            $exe->bindParam(':heureFin', $hF);
            $exe->bindParam(':opm', $opm);
            $exe->bindParam(':important', $important);
            $exe->bindParam(':responsable', $resp);
            $exe->bindParam(':idChef',$idChef );
            $exe->bindParam(':etat',$etat );
            $exe->bindParam(':commentaire',$commentaire );
            $exe->bindParam(":id",$id);
     
           
            
            
            $res=($exe->execute())?$exe->fetchAll(PDO::FETCH_OBJ): null;
          


            $exe=$dbh->prepare($sql1);
           
            
            $hD =$heureDepart;
            $hA =$heureArrivee;
            $hR =$heureRetour;
            $exe->bindParam(':id', $id);
            
            $exe->bindParam(':dateDepart', $dateDepart);
            $exe->bindParam(':dateArrivee', $dateArrivee);
            $exe->bindParam(':heureDepart', $hD);
            $exe->bindParam(':heureArrivee', $hA);
            $exe->bindParam(':dateRetour', $dateRetour);
            $exe->bindParam(':heureRetour', $hR);
           
            $res=($exe->execute())?$exe->fetchAll(PDO::FETCH_OBJ): null;
            $dbh = null;
            
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function modifier($id,$com)
    {
        $sql='update interventions SET etat="aModifier",commentaire=? where id=?';
       
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=uha-2020-gr5;charset=utf8', 'root', '1234');
            $stmt=$dbh->prepare($sql);
           
            $stmt->bindParam(1,$com);
            $stmt->bindParam(2,$id);
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
        //session_start();
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
        $sql='SELECT i.id ,i.idChef,i.responsable,i.commentaire,i.commune, i.adresse, i.typeI, i.requerant, i.dateDebut, i.heureDebut, i.dateFin, i.heureFin, i.opm,
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
        
        $rows = (array) $_SESSION["list"];
       
        
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
        header('Content-Encoding: UTF-8');
        header('Content-Type: text/csv;charset=UTF-8');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');

        //Open up a file pointer
        $fp = fopen('php://output', 'w');

        //Start off by writing the column names to the file.
        fputcsv($fp, $columnNames);

        //Then, loop through the rows and write them to the CSV file.
        foreach ($rows as $row) {
            fputcsv($fp, (array)$row);
        }

        //Close the file pointer.
        fclose($fp);
        }

        public function filtrer($d,$f,$etat,$type){
           
            //session_start();
            $dbh = new PDO('mysql:host=localhost;dbname=uha-2020-gr5;charset=utf8', 'root', '1234');
            switch($_SESSION['GP_ID'])
            {
                case 0:
                    $sql = 'SELECT * from interventions as i 
                    INNER JOIN personne p ON p.P_CODE=?
                    INNER JOIN vehicules v ON v.ID=i.id AND v.V_ID=p.v_ID where etat=? AND typeI=?
                     AND dateDebut between ? AND ?';
                    $stmt=$dbh->prepare($sql);
                    $stmt->bindParam(1,$_SESSION['user']);
                    $stmt->bindParam(2,$etat);
                    $stmt->bindParam(3,$type);
                    $stmt->bindParam(4,$d);
                    $stmt->bindParam(5,$f);
                break;

                case 2:
                    $sql = 'SELECT * from interventions  
                     where etat=? AND idChef=? AND typeI=?
                     AND dateDebut between ? AND ?';
                    $stmt=$dbh->prepare($sql);
                    $stmt->bindParam(2,$_SESSION['user']);
                    $stmt->bindParam(1,$etat);
                    $stmt->bindParam(3,$type);
                    $stmt->bindParam(4,$d);
                    $stmt->bindParam(5,$f);
                break;

                default:
                    $sql = 'SELECT * from interventions 
                    where etat=? AND responsable=? AND typeI=?
                     AND dateDebut between ? AND ?';
                     $stmt=$dbh->prepare($sql);
                    $stmt->bindParam(2,$_SESSION['user']);
                    $stmt->bindParam(1,$etat);
                    $stmt->bindParam(3,$type);
                    $stmt->bindParam(4,$d);
                    $stmt->bindParam(5,$f);
                break;
                
                
            }    
               try {
                    
                    
                     $res=($stmt->execute())?$stmt->fetchAll(PDO::FETCH_OBJ): null;
                     $dbh = null;
                     return $res;
               } catch (PDOException $e) {
                     print "Erreur !: " . $e->getMessage() . "<br/>";
                     die();
               }
            	
             }
              
}
?>
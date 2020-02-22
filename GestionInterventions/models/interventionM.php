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


}
?>
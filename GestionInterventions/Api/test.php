
<?php
include_once "dataBase.php";
include_once "ModelePersonnel.php";
include_once "ModeleVehicule.php";
include_once "ModeleIntervention.php";

$data = new DataBase();
$con = $data->connect();
$p = new ModelePersonnel($con);
$v = new ModeleVehicule($con);
$i = new ModeleIntervention($con);

//A la place de 15 et ahmed vous mettez ce que vous récupérez des champs identi et mot de passe 
// retourne le grade si la connexion est réussi false sinon
$result = $p->check_conn("17","ahmed"); 
//echo $result['P_GRADE'];
//A place de l'email vous mettez ce que vous récupérez depuis le champs mail
//Retourne le mp
$result = $p->get_pass("admin@mybrigade.org");
//echo $result['P_MDP'];
//Retourne la liste des type des véhicules
$result= $v->get_type_vehicule();
//echo $result['TV_CODE'];
$result= $i->get_type_intervention();
$result = $v->get_id_vehicule('1234-XX-YY');
$result = $p->get_names();
foreach ($result as $r) {
                                
    echo $r['P_NOM'].' '.$r['P_PRENOM'];
   
}

//$result= $v->get_type_vehicule_role("CCFM");





?>
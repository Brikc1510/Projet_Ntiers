<?php
include_once '../modele/GestionIntervention.php';
include_once '../modele/GestionVehicule.php';
include_once '../modele/Intervention.php';
include_once '../modele/Vehicule.php';
include_once "../Api/ModeleVehicule.php";
include_once "../Api/ModelePersonnel.php";
include_once "../Api/dataBase.php";

$data = new DataBase();
$con = $data->connect();
$v = new ModeleVehicule($con);
$p = new ModelePersonnel($con);
if(!empty($_POST['opm']))
{
    $opm = '1'; 
}
else
{
    $opm='0';
}

if(!empty($_POST['important']))
{
    $imp = '1'; 
}
else
{
    $imp='0';
}

$mat =$_POST['V_IMMATRICULATION'];
$result = $v->get_id_vehicule($mat);



$vehicule = new Vehicule($result['V_ID'],$_POST['TV_CODE']
                    ,$_POST['dateDepart'],$_POST['dateArrivee'],
                    $_POST['dateRetour'],$_POST['heureDepart'],
                    $_POST['heureArrivee'],$_POST['heureRetour']);
                    
$resul =$v->get_type_vehicule_role($_POST['TV_CODE']);
$count = sizeof($resul);
echo $count;
for($i = 0; $i < $count;$i++)
{
    $nom =$_POST[$i];
    $nom_prenom= explode(" ",$nom);
    
    $id=$p->get_p_code($nom_prenom[0],$nom_prenom[1]);
    echo json_encode($id);
    echo $id['P_CODE'];
    //$personne = new Personne();
}


$intervention = new Intervention($_POST['id'],$_POST['commune'],$_POST['adresse'],$_POST['type']
                                ,$_POST['requerant'],$_POST['dateDebut']
                                ,$_POST['dateFin'],$_POST['heureDebut'],
                                $_POST['heureFin'],$opm,$imp, $_POST['reponsable']);

$gestionInter = new GestionIntervention();
$gestionVehi = new GestionVehicule();
$gestionVehi->ajouterVehicule($vehicule);
$gestionInter->ajouterIntervention($intervention,$result['V_ID']);                           
?>
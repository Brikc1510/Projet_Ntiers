<?php
include_once '../modele/GestionIntervention.php';
include_once '../modele/GestionVehicule.php';
include_once '../modele/GestionPersonne.php';
include_once '../modele/Intervention.php';
include_once '../modele/Vehicule.php';
include_once '../modele/Personne.php';
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


$intervention = new Intervention($_POST['id'],$_POST['commune'],$_POST['adresse'],$_POST['type']
                                ,$_POST['requerant'],$_POST['dateDebut']
                                ,$_POST['dateFin'],$_POST['heureDebut'],
                                $_POST['heureFin'],$opm,$imp, $_POST['reponsable']);

$gestionInter = new GestionIntervention();
$gestionInter->ajouterIntervention($intervention); 
$b = true;
$k = 0;
while($b)
{
    

    if(isset($_POST['TV_CODE'.$k]))
    {
        $mat =$_POST['V_IMMATRICULATION'.$k];
        $result = $v->get_id_vehicule($mat);
        $vehicule = new Vehicule($result['V_ID'],$_POST['TV_CODE'.$k]
                            ,$_POST['dateDepart'],$_POST['dateArrivee'],
                            $_POST['dateRetour'],$_POST['heureDepart'],
                            $_POST['heureArrivee'],$_POST['heureRetour']);

        $gestionVehi = new GestionVehicule();
        $gestionVehi->ajouterVehicule($vehicule,$_POST['id']);  

        $resul =$v->get_type_vehicule_role($_POST['TV_CODE'.$k]);
        echo $k;
        $count = sizeof($resul);
        $gestionPer = new GestionPersonne();
        for($i = 0; $i < $count;$i++)
        {
            $nom =$_POST[$k.$i];
            $nom_prenom= explode(" ",$nom);
            
            $id=$p->get_p_code($nom_prenom[0],$nom_prenom[1]);
        
            $personne = new Personne($id['P_CODE'],$nom_prenom[0],$nom_prenom[1],$result['V_ID']);
        
            $gestionPer->ajouterPersonne($personne);

        }

    }else
    {
        $b=false;
    }
    $k++;
    echo $k;
}




                      
?>
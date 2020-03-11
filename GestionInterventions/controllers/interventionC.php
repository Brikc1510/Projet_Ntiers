<?php
class InterventionController {

    public function construct(){}

    public function index() {
        $this->listeParticipation();
    }
    public function add()
    {
        include_once MODELS.DS.'interventionM.php';
        include_once MODELS.DS.'personneM.php';
        include_once MODELS.DS.'vehiculeM.php';
        include_once MODELS.DS.'Intervention.php';
        include_once MODELS.DS.'Vehicule.php';
        include_once MODELS.DS.'Personne.php';
        include_once API.DS."ModeleVehicule.php";
        include_once API.DS."ModelePersonnel.php";
        include_once API.DS."dataBase.php";
        require_once CLASSES.DS.'view.php';

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

        $nom =$_POST["00"];
        $nom_prenom= explode(" ",$nom);
        $idC=$p->get_p_code($nom_prenom[0],$nom_prenom[1]);
        $nom_prenom= explode(" ",$_POST['reponsable']);
        $idR=$p->get_p_code($nom_prenom[0],$nom_prenom[1]);


        $intervention = new Intervention($_POST['id'],$_POST['commune'],$_POST['adresse'],$_POST['type']
                                        ,$_POST['requerant'],$_POST['dateDebut']
                                        ,$_POST['dateFin'],$_POST['heureDebut'],
                                        $_POST['heureFin'],$opm,$imp,$idR['P_CODE'],$idC['P_CODE']);

        $gestionInter = new InterventionModel();
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

                $gestionVehi = new VehiculeModel();
                $gestionVehi->ajouterVehicule($vehicule,$_POST['id']);  

                $resul =$v->get_type_vehicule_role($_POST['TV_CODE'.$k]);
                
                $count = sizeof($resul);
                $gestionPer = new PersonneModel();
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
            
        }
        $v=new View();
        $mm = "Intervention ajouté avec succés";
                echo "<script type='text/javascript'>alert('$mm');</script>";
              
                $v->render('saisieIntervention','view'); 
}
    public function afficher()
    {
      require_once CLASSES.DS.'view.php';
      $v=new View();
      $v->render('saisieIntervention','view');
    }
    public function listeParticipation(){
      require_once MODELS.DS.'interventionM.php';
      require_once API.DS.'dataBase.php';
      require_once API.DS.'ModeleIntervention.php';
      $con=new DataBase();
      $con=$con->connect();
      $mo=new ModeleIntervention($con);
      $m=new InterventionModel();
      $interventions=$m->listAllParticipation();
      $typesintervention=$mo->get_type_intervention();
      require_once CLASSES.DS.'view.php';
      $v=new View();
      $v->setVar('typesinterventionlist',$typesintervention);
      $v->setVar('interventionlist',$interventions);
      $v->render('intervention','list');
    }
    public function listeInterAvalider(){
      require_once MODELS.DS.'interventionM.php';
      $m=new InterventionModel();
      $intervention=$m->listeInterAvalider();
      require_once CLASSES.DS.'view.php';
      $v=new View();
      $v->setVar('interventionlistAvalider',$intervention);
      $v->render('interventionAvalider','list');
    }
    public function view($id=null){
      require_once MODELS.DS.'interventionM.php';
      $m=new InterventionModel();
      require_once CLASSES.DS.'view.php';
      $v=new View();
      if ($intervention=$m->listOne($id)) $v->setVar('i',$intervention);
      // Affichage au sein de la vue des données récupérées via le model
      $v->render('intervention','view');
    }
    public function view1($id=null){
      require_once MODELS.DS.'interventionM.php';
      $m=new InterventionModel();
      require_once CLASSES.DS.'view.php';
      $v=new View();
      if ($intervention=$m->listOne($id)) $v->setVar('j',$intervention);
      // Affichage au sein de la vue des données récupérées via le model
      $v->render('intervention','view1');
    }
    public function valider($id=null){
      require_once MODELS.DS.'interventionM.php';
      $m=new InterventionModel();
      require_once CLASSES.DS.'view.php';
      $v=new View();
      $intervention=$m->valider($id);
      $this->listeInterAvalider();
    }
    public function modifier($id=null){
      require_once MODELS.DS.'interventionM.php';
      $m=new InterventionModel();
      require_once CLASSES.DS.'view.php';

      $intervention=$m->modifier($id,$_POST["modifier"]);
      $this->listeParticipation();
      // Affichage au sein de la vue des données récupérées via le model
    }


    public function edit($id=null){
        require_once MODELS.DS.'interventionM.php';
        $m= new InterventionModel();
        //$intervention=$intervention->listOne($id);
        require_once CLASSES.DS.'view.php';
        $v=new View();
        if ($intervention=$m->listOne($id)) 
        $v->setVar('i',$intervention);
        //$v->setVar('intervention',$intervention);
        $v->render('intervention','form');

    }
    public function modified($id=null){
      require_once MODELS.DS.'interventionM.php';
      $m= new InterventionModel();
      //$intervention=$intervention->listOne($id);
      require_once CLASSES.DS.'view.php';
      $v=new View();
      if(!empty($_POST['iop']))
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
      $intervention=$m->modifierInter($id,$_POST["idChef"],$_POST["responsable"],$_POST["commune"],$_POST["adresse"],$_POST["typeI"],$_POST["requerant"],$_POST["dateDebut"],$_POST["heureDebut"],$_POST["dateFin"],$_POST["heureFin"],$opm,$imp,$_POST["dateDepart"],$_POST["heureDepart"],$_POST["dateArrivee"],$_POST["heureArrivee"],$_POST["dateRetour"],$_POST["heureRetour"]);
      $this->listeParticipation();

  }


    public function saisi(){
      require_once CLASSES.DS.'view.php';
      $v=new View();
      $v->changec(false);
      $v->render('saisieInterventionSpe','view');
  }

  public function ajouterV(){
      require_once CLASSES.DS.'view.php';
      $v=new View();
      $v->changec(false);
      $v->render('ajouterVehicule','view');
  }
  public function chercher(){
    $con = new PDO("mysql:host=localhost;dbname=ebrigade1", 'root', '1234');
    $searchTerm = $_GET['term']; 
    $search = "%".$searchTerm."%";
    $exe = $con->prepare('SELECT * FROM pompier Where P_NOM LIKE \''.$search.'\'');
        $exe->execute();
        $Liste = array(); 
        
        while($result = $exe->fetch(PDO::FETCH_OBJ)) {
           
            //$row=array("P_NOM" => $result->P_NOM,"P_PRENOM" => $result->P_PRENOM );
            array_push($Liste,$result->P_NOM." ".$result->P_PRENOM);
            
        }
        echo json_encode($Liste);
       
  }
  
  public function exporter($id =null)
  {
    require_once MODELS.DS.'interventionM.php';
      $m=new InterventionModel();
      $intervention=$m->exporter(); 
      
  }


  
     
     
   
   public function filtrer(){
      
       require_once CLASSES.DS.'view.php';
       require_once MODELS.DS.'interventionM.php';
       require_once API.DS.'dataBase.php';
      require_once API.DS.'ModeleIntervention.php';
      $con=new DataBase();
      $con=$con->connect();
      $mo=new ModeleIntervention($con);
       $v=new View();
       $m=new InterventionModel();
       $typesintervention=$mo->get_type_intervention();
       $v->setVar('typesinterventionlist',$typesintervention);
       $filtres=$m->filtrer($_POST["DateD"],$_POST["DateF"],$_POST["etat"],$_POST['type']);
       $v->setVar('interventionlist',$filtres);
       $v->render('intervention','list');
       
     }
   


}
?>
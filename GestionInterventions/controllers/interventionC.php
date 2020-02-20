<?php
class InterventionController {

    public function construct(){}

    public function index() {
        $this->liste();
    }
    public function liste(){
      require_once MODELS.DS.'interventionM.php';
      $m=new InterventionModel();
      $interventions=$m->listAll();
      //var_dump($interventions);
      // Affichage au sein de la vue des données récupérées via le model
      require_once CLASSES.DS.'view.php';
      $v=new View();
      $v->setVar('interventionlist',$interventions);
      $v->render('intervention','list');
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

    public function edit($id=null){
        require_once MODELS.DS.'interventionM.php';
        $m= new InterventionModel();
        //$intervention=$intervention->listOne($id);
        require_once CLASSES.DS.'view.php';
        $v=new View();
        if ($intervention=$m->listOne($id)) $v->setVar('i',$intervention);
        $v->setVar('intervention',$intervention);
        $v->render('intervention','form');

    }


}
?>
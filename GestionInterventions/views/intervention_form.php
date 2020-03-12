<?php
function fAge($date) {
    $datetime1 = new DateTime("today");
    $datetime2 = new DateTime($date);
    $interval = $datetime2->diff($datetime1);
    return $interval->format('%y');
}  ?>
<html>
<head>
    <title>Interventions</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/myStyle.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.min.css">
</head>
<body>

<?php require_once VIEWS.DS.'common'.DS.'entete.php';  ?>
<main role="main" class="container">
    <div class="starter-template">
        <h1>Edition d'une intervention</h1>
    </div>
    <?php echo '<form method="post" action="index.php?c=intervention&m=modified&id='.$i->id.'">'; ?>
    <div class="row">
    <label class="col-md-4 control-label">Commune :</label>
    <div class="col-md-8">
        <input type="text" name="commune" value="<?php echo $i->commune ?>" class="form-control">
        <input type="hidden" name="idChef" value="<?php echo $i->idChef ?>" class="form-control">
        <input type="hidden" name="responsable" value="<?php echo $i->responsable ?>" class="form-control">
    </div>
    </div>
    <div class="row">
    <label class="col-md-4 control-label">Adresse :</label>
    <div class="col-md-8">
        <input type="text" name="adresse" value="<?php echo $i->adresse ?>" class="form-control">
    </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Type :</label>
        <div class="col-md-8">
        <select type="text" name="typeI" class="form-control">
            <?php
            $url = 'http://127.0.0.1/Projet_Ntiers/GestionInterventions/api/interventions/';
                        $options = array(
                            'http' => array(
                                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                                'method'  => 'GET'
                            )
                        );
                        $context  = stream_context_create($options);
                        $result = file_get_contents($url, false, $context);
                        //var_dump($result);
                        
                        if ($result === FALSE) {}
                        $array = json_decode($result, true);
                        echo '<option value="'.$i->typeI.'">'.$i->typeI.'</option>';
                    
                    foreach ($array as $r) {
                            
                            echo '<option value="'. $r['TI_CODE'] .'">'. $r['TI_CODE'] .'</option>';
                        
                        }
                    echo '</select>';
            ?>
        </div>
    </div>
     <div class="row">
            <label class="col-md-4 control-label">Requerant :</label>
            <div class="col-md-8">
                <input type="text" name="requerant" value="<?php echo $i->requerant ?>" class="form-control">
            </div>
     </div>
    <div class="row">
        <label class="col-md-4 control-label">Date debut :</label>
        <div class="col-md-8">
            <input type="date" name="dateDebut" value="<?php echo $i->dateDebut ?>" class="form-control">
        </div>
    </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Heure debut :</label>
        <div class="col-md-8">
            <input type="time" name="heureDebut" value="<?php echo $i->heureDebut ?>" class="form-control">
        </div>
    </div>

    <div class="row">
        <label class="col-md-4 control-label">Date fin :</label>
        <div class="col-md-8">
            <input type="date" name="dateFin" value="<?php echo $i->dateFin ?>" class="form-control">
        </div>
    </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Heure fin :</label>
        <div class="col-md-8">
            <input type="time" name="heureFin" value="<?php echo $i->heureFin ?>" class="form-control">
        </div>
    </div>

    <div class="row">
        <label class="col-md-4 control-label">OPM :</label>
        <div class="col-md-8">
            <input type="checkbox" name="iop" value="1" class="form-control">
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Important :</label>
        <div class="col-md-8">
            <input type="checkbox" name="important" value="1" class="form-control">
        </div>
    </div>
   
    <div class="row">
        <label class="col-md-4 control-label">Date depart :</label>
        <div class="col-md-8">
            <input type="date" name="dateDepart" value="<?php echo $i->dateDepart ?>" class="form-control">
        </div>
    </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Heure depart :</label>
        <div class="col-md-8">
            <input type="time" name="heureDepart" value="<?php echo $i->heureDepart ?>" class="form-control">
        </div>
    </div>

    <div class="row">
        <label class="col-md-4 control-label">Date arrivée :</label>
        <div class="col-md-8">
            <input type="date" name="dateArrivee" value="<?php echo $i->dateArrivee ?>" class="form-control">
        </div>
    </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Heure arrivée :</label>
        <div class="col-md-8">
            <input type="time" name="heureArrivee" value="<?php echo $i->heureArrivee ?>" class="form-control">
        </div>
    </div>

    <div class="row">
        <label class="col-md-4 control-label">Date retour :</label>
        <div class="col-md-8">
            <input type="date" name="dateRetour" value="<?php echo $i->dateRetour ?>" class="form-control">
        </div>
    </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Heure retour :</label>
        <div class="col-md-8">
            <input type="time" name="heureRetour" value="<?php echo $i->heureRetour ?>" class="form-control">
        </div>
    </div>
    <br>
    <div class="row">
    <label class="col-md-4 control-label">Ce que vous devez modifier :</label>
        <div class="col-md-8">
            <textarea type="time"  readonly class="form-control"><?php echo $i->commentaire ?></textarea>
        </div>
    </div>
    <br>
    <div class="row">
        <label class="col-md-4 control-label"></label>
        <div class="col-md-8">
            <input type="submit" value="Modifier" class="btn btn-primary" />
        </div>
    </div>
</form>


</main><!-- /.container -->
</body>
</html>
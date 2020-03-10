<?php
function fAge($date) {
    $datetime1 = new DateTime("today");
    $datetime2 = new DateTime($date);
    $jnterval = $datetime2->diff($datetime1);
    return $jnterval->format('%y');
}  ?>

<html>
<head>
    <title>Affichage d'une Intervention</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/myStyle.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.min.css">
</head>
<body>

<?php require_once VIEWS.DS.'common'.DS.'entete.php';  ?>
<main role="main" class="container">
    <div class="starter-template">
        <h1>Affichage d'une intervention</h1>
    </div>
    
    <div class="row">
        <label class="col-md-4 control-label">Commune :</label>
        <div class="col-md-8">
            <?php if (isset($j->commune)) echo $j->commune; ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Adresse :</label>
        <div class="col-md-8">
            <?php if (isset($j->adresse)) echo $j->adresse; ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Type :</label>
        <div class="col-md-8">
            <?php if (isset($j->typeI)) echo $j->typeI; ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Requerant :</label>
        <div class="col-md-8">
            <?php if (isset($j->requerant)) echo $j->requerant; ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Date debut :</label>
        <div class="col-md-8">
            <?php if (isset($j->dateDebut)) echo date('d/m/Y',strtotime($j->dateDebut)); ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Heure debut :</label>
        <div class="col-md-8">
            <?php if (isset($j->heureDebut)) echo date('H:i:s',strtotime($j->heureDebut)); ?>
        </div>
    </div>

    <div class="row">
        <label class="col-md-4 control-label">Date fin :</label>
        <div class="col-md-8">
            <?php if (isset($j->dateFin)) echo date('d/m/Y',strtotime($j->dateFin)); ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Heure fin :</label>
        <div class="col-md-8">
            <?php if (isset($j->heureFin)) echo date('H:i:s',strtotime($j->heureFin)); ?>
        </div>
    </div>

    <div class="row">
        <label class="col-md-4 control-label">Date depart :</label>
        <div class="col-md-8">
            <?php if (isset($j->dateDepart)) echo date('d/m/Y',strtotime($j->dateDepart)); ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Heure depart :</label>
        <div class="col-md-8">
            <?php if (isset($j->heureDepart)) echo date('H:i:s',strtotime($j->heureDepart)); ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Date arrivée :</label>
        <div class="col-md-8">
            <?php if (isset($j->dateArrivee)) echo date('d/m/Y',strtotime($j->dateArrivee)); ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Heure arrivée :</label>
        <div class="col-md-8">
            <?php if (isset($j->heureArrivee)) echo date('H:i:s',strtotime($j->heureArrivee)); ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Date retour :</label>
        <div class="col-md-8">
            <?php if (isset($j->dateRetour)) echo date('d/m/Y',strtotime($j->dateRetour)); ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Heure retour :</label>
        <div class="col-md-8">
            <?php if (isset($j->heureRetour)) echo date('H:i:s',strtotime($j->heureRetour)); ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Responsable :</label>
        <div class="col-md-8">
            <?php if (isset($j->responsable)) echo $j->responsable; ?>
        </div>
    </div>


    <br>
    <?php if (isset($j->id)) echo '<form method="post" action="index.php?c=intervention&m=modifier&id='.$j->id.'" class="text-center">' ?> 
    <textarea name="modifier" value="modifier" rows="5"  cols="100" placeholder="Veuillez laisser un commentaire sur ce que le chef section doit modifie" required> </textarea>
    <br>                  
    <input type="submit" name="Modifie" value="Modifier" class="btn btn-success" />  
    </form> 
    <?php if (isset($j->id)) echo '<form method="post" action="index.php?c=intervention&m=valider&id='.$j->id.'" class="text-center">' ?> 
                     <input type="submit" name="Valider" value="Valider" class="btn btn-success" />  
                </form> 

</main><!-- /.container -->
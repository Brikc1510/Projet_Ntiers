<?php
function fAge($date) {
    $datetime1 = new DateTime("today");
    $datetime2 = new DateTime($date);
    $interval = $datetime2->diff($datetime1);
    return $interval->format('%y');
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
            <?php if (isset($i->commune)) echo $i->commune; ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Adresse :</label>
        <div class="col-md-8">
            <?php if (isset($i->adresse)) echo $i->adresse; ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Type :</label>
        <div class="col-md-8">
            <?php if (isset($i->typeI)) echo $i->typeI; ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Requerant :</label>
        <div class="col-md-8">
            <?php if (isset($i->requerant)) echo $i->requerant; ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Date debut :</label>
        <div class="col-md-8">
            <?php if (isset($i->dateDebut)) echo date('d/m/Y',strtotime($i->dateDebut)); ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Heure debut :</label>
        <div class="col-md-8">
            <?php if (isset($i->heureDebut)) echo date('H:i:s',strtotime($i->heureDebut)); ?>
        </div>
    </div>

    <div class="row">
        <label class="col-md-4 control-label">Date fin :</label>
        <div class="col-md-8">
            <?php if (isset($i->dateFin)) echo date('d/m/Y',strtotime($i->dateFin)); ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Heure fin :</label>
        <div class="col-md-8">
            <?php if (isset($i->heureFin)) echo date('H:i:s',strtotime($i->heureFin)); ?>
        </div>
    </div>

    <div class="row">
        <label class="col-md-4 control-label">Date depart :</label>
        <div class="col-md-8">
            <?php if (isset($i->dateDepart)) echo date('d/m/Y',strtotime($i->dateDepart)); ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Heure depart :</label>
        <div class="col-md-8">
            <?php if (isset($i->heureDepart)) echo date('H:i:s',strtotime($i->heureDepart)); ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Date arrivée :</label>
        <div class="col-md-8">
            <?php if (isset($i->dateArrivee)) echo date('d/m/Y',strtotime($i->dateArrivee)); ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Heure arrivée :</label>
        <div class="col-md-8">
            <?php if (isset($i->heureArrivee)) echo date('H:i:s',strtotime($i->heureArrivee)); ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Date retour :</label>
        <div class="col-md-8">
            <?php if (isset($i->dateRetour)) echo date('d/m/Y',strtotime($i->dateRetour)); ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Heure retour :</label>
        <div class="col-md-8">
            <?php if (isset($i->heureRetour)) echo date('H:i:s',strtotime($i->heureRetour)); ?>
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Responsable :</label>
        <div class="col-md-8">
            <?php if (isset($i->responsable)) echo $i->responsable; ?>
        </div>
    </div>

</main><!-- /.container -->
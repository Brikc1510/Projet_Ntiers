<?php
function fAge($date) {
    $datetime1 = new DateTime("today");
    $datetime2 = new DateTime($date);
    $interval = $datetime2->diff($datetime1);
    return $interval->format('%y');
}  ?>
<main role="main" class="container">
    <div class="starter-template">
        <h1>Edition d'une intervention</h1>
    </div>

    <div class="row">
        <label class="col-md-4 control-label">Id:<?php echo $i->id ?></label>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">P_CODE :</label>
        <div class="col-md-8">
            <input type="text" name="P_CODE" value="<?php echo $i->P_CODE ?>" class="form-control">
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Nom :</label>
        <div class="col-md-8">
            <input type="text" name="nom" value="<?php echo $i->nom ?>" class="form-control">
        </div>
    </div>
     <div class="row">
        <label class="col-md-4 control-label">Prenom :</label>
        <div class="col-md-8">
            <input type="text" name="prenom" value="<?php echo $i->prenom ?>" class="form-control">
        </div>
    </div>
    <div class="row">
    <label class="col-md-4 control-label">Commune :</label>
    <div class="col-md-8">
        <input type="text" name="commune" value="<?php echo $i->commune ?>" class="form-control">
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
            <input type="text" name="typeI" value="<?php echo $i->typeI ?>" class="form-control">
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
    <!--<div class="row">
        <label class="col-md-4 control-label">Date d'entrée dans l'entreprise :</label>
        <div class="col-md-8">-->
            <?php //if (isset($e->HireDate)) echo date('d/m/Y',strtotime($e->HireDate)). ' ('.fAge($e->HireDate).' ans d\'ancienneté)'; ?>
        <!--</div>
    </div>-->

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
            <input type="text" name="iop" value="<?php echo $i->opm ?>" class="form-control">
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Important :</label>
        <div class="col-md-8">
            <input type="text" name="important" value="<?php echo $i->important ?>" class="form-control">
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Responsable :</label>
        <div class="col-md-8">
            <input type="text" name="responsable" value="<?php echo $i->responsable ?>" class="form-control">
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">TV_CODE :</label>
        <div class="col-md-8">
            <input type="text" name="TV_CODE" value="<?php echo $i->TV_CODE?>" class="form-control">
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
    <div class="row">
        <label class="col-md-4 control-label"></label>
        <div class="col-md-8">
            <input type="submit" value="Update" class="btn btn-primary" />
        </div>
    </div>



</main><!-- /.container -->
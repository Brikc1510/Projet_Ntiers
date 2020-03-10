

<html>
<head>
    <title>Interventions</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/myStyle.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.min.css">
</head>
<body>

<?php require_once VIEWS.DS.'common'.DS.'entete.php';  ?>
<div class="col-md-12 col-xs-12 spacer">
    <div class="panel panel-info">
        <div class="panel-heading text-center">Liste des interventions filtrées</div
				   
				   
<main role="main" class="container">
    <div class="starter-template">
        <h1>Selection</h1>
    </div>

    <div class="row">
        <label class="col-md-4 control-label">Id:</label>
		<div class="col-md-8">
            <input type="text" name="id" value="" class="form-control">
        </div>
    </div>

    <div class="row">
    <label class="col-md-4 control-label">Adresse :</label>
    <div class="col-md-8">
        <input type="text" name="adresse" value="" class="form-control">
    </div>
    </div>
     
    <div class="row">
        <label class="col-md-4 control-label">Date debut :</label>
        <div class="col-md-8">
            <input type="date" name="dateDebut" value="" class="form-control">
        </div>
    </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Heure debut :</label>
        <div class="col-md-8">
            <input type="time" name="heureDebut" value="" class="form-control">
        </div>
    </div>

    <div class="row">
        <label class="col-md-4 control-label">Date fin :</label>
        <div class="col-md-8">
            <input type="date" name="dateFin" value="" class="form-control">
        </div>
    </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">Heure fin :</label>
        <div class="col-md-8">
            <input type="time" name="heureFin" value="" class="form-control">
        </div>
    </div>
	
    <div class="row">
        <label class="col-md-4 control-label">Responsable :</label>
        <div class="col-md-8">
            <input type="text" name="responsable" value="" class="form-control">
        </div>
    </div>
    <div class="row">
        <label class="col-md-4 control-label">TV_CODE :</label>
        <div class="col-md-8">
            <input type="text" name="TV_CODE" value="" class="form-control">
        </div>
    </div>

    <div class="row">
        <label class="col-md-4 control-label"></label>
        <div class="col-md-8">
            <input type="submit" name="submit" value="Filtrer" class="btn btn-primary" />
        </div>
    </div>



</main><!-- /.container -->
				   
				   
                   <div class="row">
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Commune</th>
                <th scope="col">Adresse</th>
                <th scope="col">Type d'intervention</th>
                <th scope="col">Requerant</th>
                <th scope="col">Responsable</th>
                <th scope="col">Type Véhicule</th>
				<th scope="col">Date debut</th>
				<th scope="col">Heure debut</th>
				<th scope="col">Date Fin</th>
				<th scope="col">Heure Fin</th>
                <th scope="col"><i class="fas fa-eye"></i></th>
        <th scope="col"><i class="fas fa-edit"></i></th>
        <th scope="col"><i class="fas fa-trash-alt"></i></th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($interventionfiltreslist as $i){ ?>
                <tr>
                    <td><?php if (isset($i->id)) echo $i->id; ?></td>
                    <td><?php if (isset($i->commune)) echo $i->commune; ?></td>
                    <td><?php if (isset($i->adresse)) echo $i->adresse; ?></td>
                    <td><?php if (isset($i->typeI)) echo $i->typeI; ?></td>
                    <td><?php if (isset($i->requerant)) echo $i->requerant; ?></td>
                    <td><?php if (isset($i->responsable)) echo $i->responsable; ?></td>
                    <td><?php if (isset($i->TV_CODE)) echo $i->TV_CODE; ?></td>
					<td><?php if (isset($i->dateDebut)) echo $i->dateDebut; ?></td>
					<td><?php if (isset($i->heureDebut)) echo $i->heureDebut; ?></td>
					<td><?php if (isset($i->dateFin)) echo $i->dateFin; ?></td>
					<td><?php if (isset($i->heureFin)) echo $i->heure; ?></td>

                    
                    <td><?php if (isset($i->id)) echo '<a href="index.php?c=intervention&m=view&id='.$i->id.'" data-toggle="tooltip" title="Voir" class="btn btn-success btn-sm"><i class="fas fa-eye">Voir</i></a>';?></td>
                    <td><?php if (isset($i->id)) echo '<a href="index.php?c=intervention&m=edit&id='.$i->id.'" data-toggle="tooltip" title="Modifier" class="btn btn-warning  btn-sm"><i class="fas fa-edit"></i></a>';?></td>
                    <td><?php if (isset($i->id)) echo '<a href="index.php?c=intervention&m=delete&id='.$i->id.'" data-toggle="tooltip" title="Supprimer" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>';?></td>



                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
    </div>
</div>
</body>
</html>
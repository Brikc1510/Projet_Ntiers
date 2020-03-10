

<html>
<head>
    <title>Interventions</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/myStyle.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.min.css">
</head>
<body>

<?php require_once VIEWS.DS.'common'.DS.'entete.php';  ?>

<form id="a" method="post" action="index.php?c=intervention&m=filtrer" class="text-center"> 
            
            <style type="text/css"> #a div {display: inline-block }</style>
                <div class="form-group">
                    <label class="control-label">Date Debut</label>
                    <input type="date" name="DateD" class="form-control" required >
                </div>
                <div class="form-group">
                    <label class="control-label">Date Fin</label>
                    <input type="date" name="DateF" class="form-control" required >
                </div> 
                     <input type="submit" name="Filter" value="Filter" class="btn btn-success" />  
                </form> 
<div class="col-md-12 col-xs-12 spacer">
    <div class="panel panel-info">
        <div class="panel-heading text-center">Liste des interventions filtrées</div>
				   
				   

				   
				   
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
    <form method="post" action="index.php?c=intervention&m=exporter" class="text-center">  
                     <input type="submit" name="export" value="CSV Export" class="btn btn-success" />  
                </form> 
</div>
</body>
</html>


<html>
<head>
    <title>Interventions</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/myStyle.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.min.css">
</head>
<body>

<?php require_once VIEWS.DS.'common'.DS.'enteteU.php';  ?>
<div class="col-md-12 col-xs-12 spacer">
    <div class="panel panel-info">
        <div class="panel-heading text-center">Liste des interventions</div>
       <!-- affichage de login de l'utulisateur qui a connecte
         <//?php echo "le login de la personne connecte est "; 
				   echo $_SESSION['user'];?>  -->
                   <div class="row">
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">Commune</th>
                <th scope="col">Adresse</th>
                <th scope="col">Type</th>
                <th scope="col">Requerant</th>
                <th scope="col">Date Debut</th>
                <th scope="col">Heure Debut</th>
                <th scope="col">Date Fin</th>
                <th scope="col">Heure Fin</th>
                <th scope="col">Responsable</th>
                <th scope="col">TV CODE</th>
                <th scope="col"><i class="fas fa-eye"></i></th>
                <th scope="col"><i class="fas fa-edit"></i></th>
                <th scope="col"><i class="fas fa-trash-alt"></i></th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($interventionlist as $i){ ?>
                <tr>
                    <td><?php if (isset($i->commune)) echo $i->commune; ?></td>
                    <td><?php if (isset($i->adresse)) echo $i->adresse; ?></td>
                    <td><?php if (isset($i->typeI)) echo $i->typeI; ?></td>
                    <td><?php if (isset($i->requerant)) echo $i->requerant; ?></td>
                    <td><?php if (isset($i->dateDebut)) echo date('d/m/Y',strtotime($i->dateDebut)); ?></td>
                    <td><?php if (isset($i->heureDebut)) echo date('H:i:s',strtotime($i->heureDebut)); ?></td>
                    <td><?php if (isset($i->dateFin)) echo date('d/m/Y',strtotime($i->dateFin)); ?></td>
                    <td><?php if (isset($i->heureFin)) echo date('H:i:s',strtotime($i->heureFin)); ?></td>
                    <td><?php if (isset($i->responsable)) echo $i->responsable; ?></td>
                    <td><?php if (isset($i->TV_CODE)) echo $i->TV_CODE; ?></td>

                    
                    <td><?php if (isset($i->id)) echo '<a href="index.php?c=intervention&m=view&id='.$i->id.'" data-toggle="tooltip" title="Voir" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>';?></td>
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
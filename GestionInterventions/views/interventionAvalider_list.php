

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
        <div class="panel-heading text-center">Liste des interventions à valider</div>
        <?php  if ($interventionlistAvalider == null)
                  echo '<p>Il y a aucune intervention à valider</p>
                  <style type="text/css"> p {color: #26b72b; text-align: center }</style>';
                else
                {
                ?>
                   
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
                <th scope="col"><i class="fas fa-eye"></i></th>
        <th scope="col"><i class="fas fa-edit"></i></th>
        <th scope="col"><i class="fas fa-trash-alt"></i></th>

            </tr>
            </thead>
            <tbody>
            <?php  
           
            foreach ($interventionlistAvalider as $j){?>
                <tr>
                   
                    <td><?php if (isset($j->id)) echo $j->id; ?></td>
                    <td><?php if (isset($j->commune)) echo $j->commune; ?></td>
                    <td><?php if (isset($j->adresse)) echo $j->adresse; ?></td>
                    <td><?php if (isset($j->typeI)) echo $j->typeI; ?></td>
                    <td><?php if (isset($j->requerant)) echo $j->requerant; ?></td>
                    <td><?php if (isset($j->responsable)) echo $j->responsable; ?></td>
                    

                    
                    <td><?php if (isset($j->id)) echo '<a href="index.php?c=intervention&m=view1&id='.$j->id.'" data-toggle="tooltip" title="Voir" class="btn btn-success btn-sm"><i class="fas fa-eye">Voir</i></a>';?></td>
                    



                </tr>
            <?php }}?>
            </tbody>
        </table>
    </div>
    </div>
</div>
</body>
</html>
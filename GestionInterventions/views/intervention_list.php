

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
                    <label class="control-label">Type Intervention</label>
                    <select type="text" name="type" class="form-control">
                    <?php
                    
                    /* $data = new DataBase();
                    $con = $data->connect();
                    $v = new ModeleIntervention($con);
                    $resultat = $v->get_type_intervention();

                    echo '<option value="">---</option>';
                    
                    foreach ($resultat as $r) {
                            
                            echo '<option value="'. $r['TI_CODE'] .'">'. $r['TI_CODE'] .'</option>';
                        
                        }
                    echo '</select>';
                     */

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
                    
                    echo '<option value="">---</option>';
                    
                    foreach ($array as $r) {
                            
                            echo '<option value="'. $r['TI_CODE'] .'">'. $r['TI_CODE'] .'</option>';
                        
                        }
                    echo '</select>';
                        
                ?> 
                </div>

                <div class="form-group">
                    <label class="control-label">Etat Intervention</label>
                    <select type="text" name="etat" class="form-control">
                            <option value="Validee" selected>Validée</option>
                            <option value="aValider">A Valider</option>
                            <option value="aModifier">A Modifier</option>
                    </select>
                </div>
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
        <div class="panel-heading text-center">Liste des interventions</div>
        <?php  if ($interventionlist == null)
                  echo '<p>Il y a aucune intervention</p>
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
        

            </tr>
            </thead>
            <tbody>
            <?php 
            foreach ($interventionlist as $i){ ?>
                <tr>
                    <td><?php if (isset($i->id)) echo $i->id; ?></td>
                    <td><?php if (isset($i->commune)) echo $i->commune; ?></td>
                    <td><?php if (isset($i->adresse)) echo $i->adresse; ?></td>
                    <td><?php if (isset($i->typeI)) echo $i->typeI; ?></td>
                    <td><?php if (isset($i->requerant)) echo $i->requerant; ?></td>
                    <td><?php if (isset($i->responsable)) echo $i->responsable; ?></td>
                    <td><?php if (isset($i->TV_CODE)) echo $i->TV_CODE; ?></td>

                    
                    <td><?php if (isset($i->id)) echo '<a href="index.php?c=intervention&m=view&id='.$i->id.'" data-toggle="tooltip" title="Voir" class="btn btn-success btn-sm"><i class="fas fa-eye">Voir</i></a>';?></td>
                    <td><?php if ($i->etat == "aModifier" && ($_SESSION['GP_ID']==2 || $_SESSION['GP_ID']==3 ||$_SESSION['GP_ID']==4) && $_SESSION['user']== $i->idChef) echo '<a href="index.php?c=intervention&m=edit&id='.$i->id.'" data-toggle="tooltip" title="Modifier" class="btn btn-warning  btn-sm">Modifier<i class="fas fa-edit"></i></a>';?></td>


                </tr>
            <?php }}?>
            </tbody>
        </table>

       
    </div>
    
    </div>
    <?php $_SESSION["list"]=$interventionlist;?>
    <form method="post" action="index.php?c=intervention&m=exporter" class="text-center">  
                     <input type="submit" name="export" value="CSV Export" class="btn btn-success" />  
                </form> 
</div>
</body>
</html>
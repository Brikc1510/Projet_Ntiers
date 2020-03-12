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
<?php require_once VIEWS.DS.'common'.DS.'enteteU.php';  ?>
<body>




<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php foreach ($info as $e){ ?>    
            <div class="container">    
                  <div class="row">
                      <div class="panel panel-default">
                      <div class="panel-heading">  <h4 >Mon profil</h4></div>
                       <div class="panel-body">
                      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                       <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 
                     
                 
                      </div>
                      <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
                          <div class="container" >
                          
                            <h2> <?php if (isset($e->P_PRENOM)) echo $e->P_PRENOM; ?>  <?php if (isset($e->P_NOM)) echo $e->P_NOM; ?></h2>
                            <p> <b>Profession:<?php if (isset($e->P_PROFESSION)) echo $e->P_PROFESSION; ?></b></p>
                            <p> <b>Date de naissance <?php if (isset($e->P_BIRTHDATE)) echo $e->P_BIRTHDATE; ?></b></p>
                            <p> <b>Sexe: <?php if (isset($e->P_SEXE)) echo $e->P_SEXE; ?></b></p>
                            <p> <b>adresse: <?php if (isset($e->P_ADDRESS)) echo $e->P_ADDRESS; ?></b></p>
                            <p> <b>Date d'engagement  <?php if (isset($e->P_DATE_ENGAGEMENT)) echo $e->P_DATE_ENGAGEMENT; ?></b></p>
                          

                           
                          </div>
                           <hr>
                          <ul class="container details" >
                            <li><p><span class="glyphicon glyphicon-earphone" style="width:50px;"></span> <?php if (isset($e->P_PHONE)) echo $e->P_PHONE; ?></p></li>
                            <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span>  <?php if (isset($e->P_EMAIL)) echo $e->P_EMAIL; ?></p></li>
                          </ul>
                      </div>
                      <?php if (isset($e->P_CODE)) echo ' <a href="index.php?c=user&m=modifier&id='.$e->P_CODE.'" class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Modifier l\'employé"><i class="fas fa-edit"></i> Modifier</a>';?>
                </div>
            </div>
            </div>
            <?php }?>
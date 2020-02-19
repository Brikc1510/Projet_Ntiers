<?php
 session_start();
 if($_SESSION["user"]!=true)
 {
     header('location:index.php');
 }

?>

<html>
<head>
    <title>Interventions</title>
    <link rel="stylesheet" type="text/css" href="../css/myStyle.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>

<?php require_once("enteteU.php"); ?>
<div class="col-md-12 col-xs-12 spacer">
    <div class="panel panel-info">
        <div class="panel-heading text-center">Liste des interventions</div>
       <!-- affichage de login de l'utulisateur qui a connecte
         <//?php echo "le login de la personne connecte est "; 
				   echo $_SESSION['user'];?>  -->
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>NOM</th><th>PRENOM</th><th>COMMUNE</th><th>ADRESSE</th><th>TYPE</th><th>REQUERANT</th><th>DATE DEBUT</th><th>HEURE DEBUT</th><th>DATE FIN</th><th>HEURE FIN</th><th>TV_CODE</th><th>DATE DEPART</th><th>DATE RETOUR</th></th><th>RESPONSABLE</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
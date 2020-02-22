<?php
 session_start();
 if($_SESSION["user"]!=true)
 {
     header('location:index.php');
 }
 $i = 0;
$_SESSION['i'] = $i;
 
echo $_SESSION['i'];
?>
<html>
<head>
    <meta charset="UTF-8"/>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../css/myStyle.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="../js/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
<script src="../js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> -->
        
</head>
<body>


<script>
let i =0;
 $(document).ready(function() { 
		// au changement du select :
		$('#b').on( 'change', '#TV_CODE'+i, function() { 
			var val = $(this).val(); 
            console.log(i);
			$.ajax({
                
				type		: 'POST',				// on envoie en post
				url		: 'saisieInterventionSpe.php',			// fichier de traitement PHP => Attention a bien vérifier le chemin (rrelatif, ou absolu) !
				data		:'TV_CODE='+val+'&i='+i ,	// on transmet la donnée, qui sera récupérée par $_POST['TV_CODE']
				
                success	: function(t) {
					
					$('#b').html(t);// on affiche le résultat renvoyé par le fichier PHP dans le <div>  
                    
                }
			});
		});
	})
    $(document).ready(function() { 
		// au changement du select :
		$('#ajouter').on( 'click', function() { 
			var val = $(this).val(); 
			$.ajax({
                
				type		: 'POST',				// on envoie en post
				url		: 'ajoutVehicule.php',			// fichier de traitement PHP => Attention a bien vérifier le chemin (rrelatif, ou absolu) !
					// on transmet la donnée, qui sera récupérée par $_POST['TV_CODE']
				
                success	: function(t) {
					
					$('#b').append(t);// on affiche le résultat renvoyé par le fichier PHP dans le <div>  
                    
                    console.log(i);
                    
                    
                }
			});
		});
	})
    function a()
    {
        i++;
        console.log('#TV_CODE'+i);
    }
    
</script>
<?php require_once("entete.php"); 
        include_once "../Api/dataBase.php";
        include_once "../Api/ModeleVehicule.php";
        include_once "../Api/ModeleIntervention.php";
        
?>
<div class="col-md-6 col-xs-12 col-md-offset-3 spacer" >
    <div class="panel panel-info">
          <!-- affichage de login de l'utulisateur qui a connecte
         <//?php echo "le login de la personne connecte est "; 
				   echo $_SESSION['user'];?>  -->
        <div class="panel-heading"><h4>Saisie d'une intervention</h4></div>
        <div class="panel-body">
            <form method="post" action="../controlleur/saveIntervention.php"  >
                <div class="form-group">
                    <label class="control-label">N° intervention</label>
                    <input type="text" name="id" class="form-control" >
                </div>
                <div class="form-group">
                    <label class="control-label">Commune d'intervention</label>
                    <input type="text" name="commune" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Adresse d'intervention</label>
                    <input type="text" name="adresse" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Type d'intervention</label>
                    <select type="text" name="type"  class="form-control"  >
                    <?php
                    
                        $data = new DataBase();
                        $con = $data->connect();
                        $v = new ModeleIntervention($con);
                        $resultat = $v->get_type_intervention();

                        echo '<option value="">---</option>';
                        
                        foreach ($resultat as $r) {
                                
                                echo '<option value="'. $r['TI_CODE'] .'">'. $r['TI_CODE'] .'</option>';
                            
                            }
                        echo '</select>';
                        
                            
                        ?>
                </div>
                <div class="form-group">
                    <label class="control-label">Requérant</label>
                        <select type="text" name="requerant" class="form-control">
                            <option value="Alerte locale" selected>CODIS</option>
                             <option value="Alerte locale">Alerte locale</option>
                        </select>
                </div>

                <div class="form-group">
                    <label class="control-label">Date de déclenchement</label>
                    <input type="date" name="dateDebut" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Date fin</label>
                    <input type="date" name="dateFin" class="form-control">
                </div>

                <div class="form-group">
                    <label class="control-label">Heure de déclenchement</label>
                    <input type="time" name="heureDebut" class="form-control">
                </div>

                <div class="form-group">
                    <label class="control-label">Heure fin</label>
                    <input type="time" name="heureFin" class="form-control">
                </div>

                <div class="form-group">
                    <label class="control-label">OPM</label>
                    <input type="checkbox" name="opm" value="1" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Important</label>
                    <input type="checkbox" name="important" value="1" class="form-control">
                </div>

                <div class="form-group" id="b" >
                    <label  class="control-label">Nom de l'engin</label>
                    <select type="text" <?php echo 'name='."TV_CODE".$_SESSION['i'] ?> <?php echo 'id='."TV_CODE$i" ?> class="form-control"  >
                    <?php
                    
                        $data = new DataBase();
                        $con = $data->connect();
                        $v = new ModeleVehicule($con);
                        $resultat = $v->get_type_vehicule();

                        echo '<option value="">---</option>';
                        
                        foreach ($resultat as $r) {
                                
                                echo '<option value="'. $r['TV_CODE'] .'">'. $r['TV_CODE'] .'</option>';
                            
                            }
                        echo '</select>';
                        
                        
                        ?>
                </div>
               

                <button type="button" class="btn btn-primary" id="ajouter" onClick=a()>Ajouter un autre véhicule</button>
                


                <div class="form-group">
                    <label class="control-label">Date de départ</label>
                    <input type="date" name="dateDepart" class="form-control">
                </div>

                <div class="form-group">
                    <label class="control-label">Heure de départ</label>
                    <input type="time" name="heureDepart" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Date arrivée sur le lieux</label>
                    <input type="date" name="dateArrivee" class="form-control">
                </div>

                <div class="form-group">
                    <label class="control-label">Heure de Arrivée</label>
                    <input type="time" name="heureArrivee" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Date de retour</label>
                    <input type="date" name="dateRetour" class="form-control">
                </div>

                <div class="form-group">
                    <label class="control-label">Heure de retour</label>
                    <input type="time" name="heureRetour" class="form-control">
                </div>

                <div class="form-group">
                    <label class="control-label">Responsable</label>
                    <input type="text" name="reponsable" class="form-control">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Ajouter une intervention</button>
                </div>
                
                
            </form>
        </div>
    </div>
</div>
</body>
<script>
    
                            
    </script>
</html>
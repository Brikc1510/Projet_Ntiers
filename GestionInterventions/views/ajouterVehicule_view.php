
<link rel="stylesheet" type="text/css" href="vendors/css/myStyle.css">
<link rel="stylesheet" type="text/css" href="vendors/css/monCSS.css">
<link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.min.css">
<link href="vendors/js/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
<script src="vendors/js/jquery-ui-1.12.1/jquery-ui.min.js"></script>

        
<script>

         
        $('#TV_CODE'+i).on( 'change', '#TV_CODE'+i, function() { 
			var val = $(this).val(); 
			$.ajax({
                
				type		: 'POST',				// on envoie en post
				url		: 'index.php?c=intervention&m=saisi',			// fichier de traitement PHP => Attention a bien vérifier le chemin (rrelatif, ou absolu) !
				data		: 'TV_CODE='+val,	// on transmet la donnée, qui sera récupérée par $_POST['TV_CODE']
				
                success	: function(t) {
					
					$('#TV_CODE'+i).html(t);// on affiche le résultat renvoyé par le fichier PHP dans le <div>  
                    
                }
			});
		});
        
    </script>
<?php 
       require_once API.DS.'dataBase.php';

?>
                
                        
                    
                <div class="form-group"<?php echo 'id='."TV_CODE".$_SESSION['i'] ?>>
                    <label  class="control-label">Nom de l'engin</label>
                    <select type="text" <?php echo 'name='."TV_CODE".$_SESSION['i'] ?> <?php echo 'id='."TV_CODE".$_SESSION['i'] ?> class="form-control"  >
                    <?php
                    
                    $url = 'http://127.0.0.1/Projet_Ntiers/GestionInterventions/api/vehicules/type/';
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
                                
                                echo '<option value="'. $r['TV_CODE'] .'">'. $r['TV_CODE'] .'</option>';
                            
                            }
                        echo '</select>';
                        
                        
                        ?>
                         
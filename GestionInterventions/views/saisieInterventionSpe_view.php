
<link rel="stylesheet" type="text/css" href="vendors/css/myStyle.css">
<link rel="stylesheet" type="text/css" href="vendors/css/monCSS.css">
<link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.min.css">
<link href="vendors/js/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
<script src="vendors/js/jquery-ui-1.12.1/jquery-ui.min.js"></script>

        
<script>

            $(document).ready(function(){
			$('.my-form-control').autocomplete({
				//source: '../controlleur/search.php'
                source: 'index.php?c=intervention&m=chercher'
			});
		});
       
        
    </script>
<?php 
      
       
        require_once API.DS.'dataBase.php';
        
        
?>
                <div class="form-group" >
                    <label  class="control-label">Nom de l'engin</label>
                    <select type="text" <?php echo 'name='."TV_CODE".$_SESSION['i'] ?> <?php echo 'id='."TV_CODE".$_SESSION['i'] ?> class="form-control" >
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

                        echo '<option value="'.$_POST['TV_CODE'].'">'.$_POST['TV_CODE'].'</option>';
                        
                        foreach ($array as $r) {
                                
                                echo '<option value="'. $r['TV_CODE'] .'">'. $r['TV_CODE'] .'</option>';
                            
                            }
                        echo '</select>';
                    ?>    
                    <label  class="control-label">Matricule de l'engin</label>            
                    <select type="text" <?php echo 'name='."V_IMMATRICULATION".$_SESSION['i'] ?> class="form-control" >
                    <?php
                        $url = 'http://127.0.0.1/Projet_Ntiers/GestionInterventions/api/vehicules/mat/'.$_POST['TV_CODE'];
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
    
                        


                  
                        
                        foreach ($array as $r) {
                               
                                echo '<option value="'. $r['V_IMMATRICULATION'] .'">'. $r['V_IMMATRICULATION'] .'</option>';
                            
                            }
                        echo '</select>';
                    ?>      
                     <?php       
                        $var = isset($_POST['TV_CODE'])?$_POST['TV_CODE']:NULL;
                       
                        $url = 'http://127.0.0.1/Projet_Ntiers/GestionInterventions/api/vehicules/role/'.$var;
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
                    $resultat = json_decode($result, true); 
                    ?>     
                        <div class=form-group id="  <?php echo $var ?>" >
                        <?php    
                            $j =0;
                           
                            $r = $resultat[0];
                            $nom = $_SESSION['nomPrenom'];
                            
                            
                        ?>
                            <label class="control-label"><?php echo $r['ROLE_NAME']?>:</label>
                            
                            <input type="text" name="<?php echo $_SESSION['i'].$j?>" value="<?php echo $nom[0] ?>" class="my-form-control">
                        <?php
                           
                            $b= false;
                            foreach($resultat as $r) {
                                if($b)
                                {
                        ?>
                            <label class="control-label"><?php echo $r['ROLE_NAME']?>:</label>
                            
                            <input type="text" name="<?php echo $_SESSION['i'].$j?>" placeholder="NOM PRENOM" class="my-form-control">
                        <?php 
                                }
                                $b=true;
                            $j = $j+1;
                            }
                        ?>
                 
                        </div>
                        
                       <?php  
                       
                       $_SESSION['i']++;
                       ?>
                    
                </div>

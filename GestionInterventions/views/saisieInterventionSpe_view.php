
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
        require_once API.DS.'ModeleVehicule.php';
        
        session_start();
?>
                <div class="form-group" >
                    <label  class="control-label">Nom de l'engin</label>
                    <select type="text" <?php echo 'name='."TV_CODE".$_SESSION['i'] ?> <?php echo 'id='."TV_CODE".$_SESSION['i'] ?> class="form-control" >
                    <?php
                    
                        $data = new DataBase();
                        $con = $data->connect();
                        $v = new ModeleVehicule($con);
                        $resultat = $v->get_type_vehicule();

                        echo '<option value="'.$_POST['TV_CODE'].'">'.$_POST['TV_CODE'].'</option>';
                        
                        foreach ($resultat as $r) {
                                
                                echo '<option value="'. $r['TV_CODE'] .'">'. $r['TV_CODE'] .'</option>';
                            
                            }
                        echo '</select>';
                    ?>    
                    <label  class="control-label">Matricule de l'engin</label>            
                    <select type="text" <?php echo 'name='."V_IMMATRICULATION".$_SESSION['i'] ?> class="form-control" >
                    <?php

                        $data = new DataBase();
                        $con = $data->connect();
                        $v = new ModeleVehicule($con);
                        $resultat = $v->get_mat_vehicule($_POST['TV_CODE']);
                  
                        
                        foreach ($resultat as $r) {
                               
                                echo '<option value="'. $r['V_IMMATRICULATION'] .'">'. $r['V_IMMATRICULATION'] .'</option>';
                            
                            }
                        echo '</select>';
                    ?>      
                     <?php       
                        $var = isset($_POST['TV_CODE'])?$_POST['TV_CODE']:NULL;
                       
                        $resultat = $v->get_type_vehicule_role($var);
                    ?>     
                        <div class=form-group id="  <?php echo $var ?>" >
                        <?php    
                            $j =0;
                            foreach ($resultat as $r) {
                        ?>
                            <label class="control-label"><?php echo $r['ROLE_NAME']?>:</label>
                            
                            <input type="text" name="<?php echo $_SESSION['i'].$j?>" placeholder="NOM PRENOM" class="my-form-control">
                        <?php 
                            $j = $j+1;
                            }
                        ?>
                 
                        </div>
                        
                       <?php  
                       $_SESSION['i']++;
                       ?>
                    
                </div>

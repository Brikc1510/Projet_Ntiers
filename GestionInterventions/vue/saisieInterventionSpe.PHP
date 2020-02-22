
<link rel="stylesheet" type="text/css" href="../css/myStyle.css">
<link rel="stylesheet" type="text/css" href="../css/monCSS.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link href="../js/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
<script src="../js/jquery-ui-1.12.1/jquery-ui.min.js"></script>

        
<script>
/* $(function() {
   
     $("#name").on('input', function() {
        $("#name").autocomplete({ 
                source: "../controlleur/search.php",
                select: function( event, ui ) {
                event.preventDefault();
                $("#name").val(ui.item.P_NOM);
                }   
            });
        });

});
 */


            $(document).ready(function(){
			$('.my-form-control').autocomplete({
				source: '../controlleur/search.php'
			});
		});
       
    
    </script>
<?php 
        include_once "../Api/dataBase.php";
        include_once "../Api/ModeleVehicule.php";
?>
                <div class="form-group" id="b" >
                    <label  class="control-label">Nom de l'engin</label>
                    <select type="text" name="TV_CODE" id="TV_CODE" class="form-control" >
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
                    <select type="text" name="V_IMMATRICULATION"  class="form-control" >
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
                            $i =0;
                            foreach ($resultat as $r) {
                        ?>
                            <label class="control-label"><?php echo $r['ROLE_NAME']?>:</label>
                            
                            <input type="text" name="<?php echo $i ?>" placeholder="NOM PRENOM" class="my-form-control">
                        <?php 
                            $i = $i+1;
                            }
                        ?>
                 
                        </div>
                    
                </div>

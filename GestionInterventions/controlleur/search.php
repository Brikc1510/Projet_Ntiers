

 <?php
$con = new PDO("mysql:host=localhost;dbname=ebrigade1", 'root', '1234');
$searchTerm = $_GET['term']; 
$search = "%".$searchTerm."%";
$exe = $con->prepare('SELECT * FROM pompier Where P_NOM LIKE \''.$search.'\'');
        $exe->execute();
        $Liste = array(); 
        
        while($result = $exe->fetch(PDO::FETCH_OBJ)) {
           
            //$row=array("P_NOM" => $result->P_NOM,"P_PRENOM" => $result->P_PRENOM );
            array_push($Liste,$result->P_NOM." ".$result->P_PRENOM);
            
        }
        echo json_encode($Liste);
       
?>
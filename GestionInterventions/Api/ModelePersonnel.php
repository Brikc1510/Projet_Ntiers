<?php
session_start();


class ModelePersonnel
{
    private $con;

    function __construct($con)
    {
        $this->con =$con;
    }
    //Pour vérifier si les matricule et le mp existe dans la base de donnée
    public function check_conn($name,$pass) {
        {
            if (!empty($name) && !empty($pass)) {
    
                $st = $this->con->prepare("select P_CODE,P_MDP,P_GRADE from pompier where P_CODE=? and P_MDP=?");
                $st->bindParam(1, $name);
    
                $st->bindParam(2, $pass);
                $st->execute();
                return $st;
                
            }
        }     
  
	
    }


    function get_pass($email) {
       
        $st = $this->con->prepare("select P_MDP from pompier where P_EMAIL=?");
        $st->bindParam(1, $email);
        $st->execute();
        return $st;

    }
    public function changer($code, $pass)
    {
        //echo "bonjour ";
        $st = $this->con->prepare("SELECT code, email from resetpassword where code=?");
        $st->bindParam(1, $code);
        $st->execute();
        return $st;
        
    }
	function get_p_code($nom,$prenom) {
       
        $exe = $this->con->prepare('SELECT * FROM pompier WHERE P_NOM =? AND P_PRENOM=?');
        $exe->bindParam(1, $nom);
        $exe->bindParam(2, $prenom);
        $exe->execute();
        $Liste = array(); 
        
        while($result = $exe->fetch(PDO::FETCH_OBJ)) {
            
            $Liste = array("P_CODE" => $result->P_CODE);
    
        }
    
        return $Liste;
    }  
    
    function get_name($code) {
       
        $exe = $this->con->prepare('SELECT * FROM pompier WHERE P_CODE =?');
        $exe->bindParam(1, $code);
        $exe->execute();
        $Liste = array(); 
        
        while($result = $exe->fetch(PDO::FETCH_OBJ)) {
            
            array_push($Liste,$result->P_NOM." ".$result->P_PRENOM);
    
        }
    
        return $Liste;
    }      

    function get_names($i) {
       
        $search = "%".$i."%";
        $exe = $this->con->prepare('SELECT * FROM pompier Where P_NOM LIKE \''.$search.'\'');
        $exe->execute();
        $Liste = array(); 
        
        while($result = $exe->fetch(PDO::FETCH_OBJ)) {
           
            //$row=array("P_NOM" => $result->P_NOM,"P_PRENOM" => $result->P_PRENOM );
            array_push($Liste,$result->P_NOM);
            
        }
       
       
        return $Liste;
    }      





}

?>
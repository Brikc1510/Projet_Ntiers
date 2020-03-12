<?php



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
    
                $st = $this->con->prepare("select P_CODE,P_MDP,P_GRADE,GP_ID from pompier where P_CODE=? and P_MDP=?");
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
    public function information($code)
    {
        $st = $this->con->prepare("SELECT * from pompier where P_code=? ");
        $st->bindParam(1, $code);
        $res=($st->execute())?$st->fetchAll(PDO::FETCH_OBJ): null;
        $dbh = null;
        return $res;
        //var_dump($users);
        return $res;

       
    }   
    public function update($code,$name,$pr,$sexe,$dated,$add,$poste,$tele,$email,$datee)
    {
        
        $data =[
            'name'=>$name,
            'pr'=>$pr,
            'sexe'=>$sexe,
            'dated'=>$dated,
            'add'=>$add,
            'poste'=>$poste,
            'tele'=>$tele,
            'email'=>$email,
            'datee'=>$datee,
            'code'=>$code
        ];
        $st = $this->con->prepare("UPDATE `pompier` SET P_NOM=:name,P_PRENOM=:pr,P_SEXE=:sexe,P_BIRTHDATE=:dated, P_ADDRESS=:add,P_PROFESSION=:poste,P_PHONE=:tele,P_EMAIL=:email,P_DATE_ENGAGEMENT=:datee WHERE P_CODE=:code");
        $st->execute($data);
        return "ok";
       
       
    }   	   

    /* if(!empty($_GET['id']) && !empty($_GET['pass']))
    {   $pass=$_GET['pass'];
        $id=$_GET['id'];

        check_conn($id,$_GET['pass']);
    } */



}

?>
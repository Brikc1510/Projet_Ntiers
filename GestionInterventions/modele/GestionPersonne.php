<?php
include_once 'ConnexionDB.php';
class GestionPersonne
{
    public $con;

    function __construct()
    {
        $c =new ConnexionDB();
        $this->con =$c->connect();
    }
    

    function ajouterPersonne($i)
    {
        try{
			
		
        $query = 'INSERT INTO personne
        SET
        P_CODE= :P_CODE,
        nom= :nom,
        prenom =:prenom,
        V_ID= :V_ID
        ';

        
       
        $exe = $this->con->prepare($query);
        $exe->bindParam(':P_CODE', $i->code);
        $exe->bindParam(':nom', $i->nom);
        $exe->bindParam(':prenom', $i->prenom);
        $exe->bindParam(':V_ID', $i->v);
        
        var_dump($exe);

        if($exe->execute())
        {
            echo 'done';
        }
        else
        {
            print_r($exe->errorInfo());
            echo 'error';
        }

    }
    catch(Exception $e) {

    echo $e->getMessage();
    }
            
    }
}
?>
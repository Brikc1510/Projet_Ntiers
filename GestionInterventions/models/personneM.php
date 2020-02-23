<?php

class PersonneModel {

    public function construct(){}
    function ajouterPersonne($i)
        {
            try{
                
                $con = new PDO('mysql:host=localhost;dbname=uha-2020-gr5;charset=utf8', 'root', '1234');
            $query = 'INSERT INTO personne
            SET
            P_CODE= :P_CODE,
            nom= :nom,
            prenom =:prenom,
            V_ID= :V_ID
            ';
    
            
           
            $exe = $con->prepare($query);
            $exe->bindParam(':P_CODE', $i->code);
            $exe->bindParam(':nom', $i->nom);
            $exe->bindParam(':prenom', $i->prenom);
            $exe->bindParam(':V_ID', $i->v);
            
            
    
            if($exe->execute())
            {
                
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
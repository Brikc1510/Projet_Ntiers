<?php
class Personne
{
    public $code;
    public $nom;
    public $prenom;
    public $v;
    
   
   
    function __construct($code,$nom,$prenom,$v)
    {
        $this->code=$code;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->v=$v;
       
       
    }


}


?>
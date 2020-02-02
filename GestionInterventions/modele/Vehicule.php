<?php
class Vehicule
{
    public $id;
    public $typeV;
    public $dateD;
    public $dateA;
    public $heureD;
    public $dateR;
    public $heureA;
    public $heureR;
   
    function __construct($id,$typeV,$dateD,$dateA,$dateR,$heureD,$heureA,$heureR)
    {
        $this->id=$id;
        $this->typeV=$typeV;
        $this->dateD=$dateD;
        $this->dateA=$dateA;
        $this->dateR=$dateR;
        $this->heureD=$heureD;
        $this->heureA=$heureA;
        $this->heureR=$heureR;
       
    }


}


?>
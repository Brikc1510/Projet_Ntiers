<?php
class Intervention
{
    public $id;
    public $commune;
    public $adresse;
    public $typeI;
    public $requerant;
    public $dateD;
    public $dateF;
    public $heureD;
    public $heureF;
    public $opm;
    public $impor;
    public $resp;
    public $idChef;
    function __construct($id,$commune,$adresse,$typeI,$requerant,$dateD,$dateF,$heureD,$heureF,$opm,$impor,$resp,$idChef)
    {
        $this->id=$id;
        $this->commune=$commune;
        $this->adresse=$adresse;
        $this->typeI=$typeI;
        $this->requerant=$requerant;
        $this->dateD=$dateD;
        $this->dateF=$dateF;
        $this->heureD=$heureD;
        $this->heureF=$heureF;
        $this->opm=$opm;
        $this->impor=$impor;
        $this->resp=$resp;
        $this->idChef=$idChef;
    }


}


?>
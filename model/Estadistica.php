<?php

Class Estadistica{

    private $id;
    private $fk_pre;
    private $cantVotosOpcion1;
    private $cantVotosOpcion2;
    private $cantVotos;


    public function __construct($id,$fk_pre,$cantVotosOpcion1,$cantVotosOpcion2,$cantVotos){
        $this->id= $id;
        $this->fk_pre= $fk_pre;
        $this->cantVotosOpcion1 = $cantVotosOpcion1;
        $this->cantVotosOpcion2 = $cantVotosOpcion2;
        $this->cantVotos = $cantVotos;

    }



    public function getId(){
        
        return $this->id;
    }

    public function getFk_pre(){
        
        return $this->fk_pre;
    }


    public function getCantVotosOpcion1(){
        
        return $this->cantVotosOpcion1;
    }


    public function getCantVotosOpcion2(){
        
        return $this->cantVotosOpcion2;
    }

    public function getCantVotos(){
        
        return $this->cantVotos;
    }
     
    

    
    public function setId($id){
        $this->id = $id;
    }

    public function setFk_pre($fk_pre){
        $this->fk_pre = $fk_pre;
    }


    public function setCantVotosOpcion1($cantVotosOpcion1){
        $this->cantVotosOpcion1 = $cantVotosOpcion1;
    }


    public function setCantVotosOpcion2($cantVotosOpcion2){
        $this->cantVotosOpcion2 = $cantVotosOpcion2;
    }

    public function setCantVotos($cantVotos){
        $this->cantVotos = $cantVotos;
    }


}



?>
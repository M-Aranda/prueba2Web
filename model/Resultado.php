<?php

Class Resultado{

    private $id;
    private $cantVotosOpcion1;
    private $cantVotosOpcion2;
    private $fk_pregunta;


    public function __construct($id,$cantVotosOpcion1,$cantVotosOpcion2,$fk_pregunta){
        $this->id= $id;
        $this->cantVotosOpcion1 = $cantVotosOpcion1;
        $this->cantVotosOpcion2 = $cantVotosOpcion2;
        $this->fk_pregunta = $fk_pregunta;

    }



    public function getId(){
        
        return $this->id;
    }


    public function getCantVotosOpcion1(){
        
        return $this->cantVotosOpcion1;
    }


    public function getCantVotosOpcion2(){
        
        return $this->cantVotosOpcion2;
    }

    public function getFk_pregunta(){
        
        return $this->fk_pregunta;
    }

     
    

    
    public function setId($id){
        $this->id = $id;
    }


    public function setCantVotosOpcion1($cantVotosOpcion1){
        $this->cantVotosOpcion1 = $cantVotosOpcion1;
    }


    public function setCantVotosOpcion2($cantVotosOpcion2){
        $this->cantVotosOpcion2 = $cantVotosOpcion2;
    }

    public function setFk_pregunta($fk_pregunta){
        $this->fk_pregunta = $fk_pregunta;
    }


}



?>
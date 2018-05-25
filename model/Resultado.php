<?php

Class Resultado{

    private $id;
    private $op1Seleccionada;
    private $op2Seleccionada;
    private $fk_pregunta;


    public function __construct($id,$op1Seleccionada,$op2Seleccionada,$fk_pregunta){
        $this->id= $id;
        $this->op1Seleccionada = $op1Seleccionada;
        $this->op2Seleccionada = $op2Seleccionada;
        $this->fk_pregunta = $fk_pregunta;

    }



    public function getId(){
        
        return $this->id;
    }


    public function getOp1Seleccionada1(){
        
        return $this->op1Seleccionada;
    }


    public function getOp2Seleccionada(){
        
        return $this->cantVotosOpcion2;
    }

    public function getFk_pregunta(){
        
        return $this->fk_pregunta;
    }

     
    

    
    public function setId($id){
        $this->id = $id;
    }


    public function setOp1Seleccionada($op1Seleccionada){
        $this->op1Seleccionada = $op1Seleccionada;
    }


    public function setOp2Seleccionada($op2Seleccionada){
        $this->op2Seleccionada = $op2Seleccionada;
    }

    public function setFk_pregunta($fk_pregunta){
        $this->fk_pregunta = $fk_pregunta;
    }


}



?>
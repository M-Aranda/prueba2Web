<?php

Class Pregunta{

    private $id;
    private $opcion1;
    private $opcion2;

    public function __construct($id,$opcion1,$opcion2){
        $this->id= $id;
        $this->opcion1 = $opcion1;
        $this->opcion2 = $opcion2;

    }



    public function getId(){
        
        return $this->id;
    }


    public function getOpcion1(){
        
        return $this->opcion1;
    }


    public function getOpcion2(){
        
        return $this->opcion2;
    }

     
    

    
    public function setId($id){
        $this->id = $id;
    }


    public function setOpcion1($opcion1){
        $this->opcion1 = $opcion1;
    }


    public function setOpcion2($opcion2){
        $this->opcion2 = $opcion2;
    }


}



?>
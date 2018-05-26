<?php
require_once("Conexion.php");
require_once("Pregunta.php");

class Data{
    private $con;

    public function __construct(){
        $this->con = new Conexion();
    }

    public function usarConexion($query){

        $this->con->conectar();
        $this->con->ejecutar($query);
        $this->con->desconectar();


    }

    public function crearPregunta($opcion1, $opcion2){
        $query = "INSERT INTO pregunta VALUES (NULL, '$opcion1', '$opcion2')";
        $this->usarConexion($query);
        

    }



    public function rescatarPreguntas(){
        $query= "SELECT * FROM pregunta";

        $this->con->conectar();

        $rs = $this->con->ejecutar($query);


        
        $preguntas = array();


        while($reg = $rs->fetch_array()){
            

            $idPreg=$reg[0];
            $opcion1=$reg[1];
            $opcion2=$reg[2];


            $pregunta = new Pregunta($idPreg,$opcion1,$opcion2);
            

            $preguntas[]=$pregunta;


        }


        $this->con->desconectar();

        return $preguntas;
    }


    public function crearResultado($op1Seleccionada, $op2Seleccionada, $fk_pregunta){
        $query = "INSERT INTO resultado VALUES (NULL, '$op1Seleccionada', '$op2Seleccionada', '$fk_pregunta')";
        $this->usarConexion($query);
        

    }

    public function sumarCantVotos($fk_pregunta){
        $query="UPDATE estadistica SET cantVotos=cantVotos+1 WHERE fk_pregunta=$fk_pregunta";
        $this->usarConexion($query);
    }





    public function actualizarCantVotosOp1($fk_pregunta){
        $query= "UPDATE estadistica SET cOp1=cOp1+1 WHERE fk_pregunta=$fk_pregunta";
        $this->usarConexion($query);


    }    

    public function actualizarCantVotosOp2($fk_pregunta){
        $query= "UPDATE estadistica SET cOp2=cOp2+1 WHERE fk_pregunta=$fk_pregunta";
        $this->usarConexion($query);


    }


    public function rescatarEstadisticas(){
        $query= "SELECT * FROM estadistica";

        $this->con->conectar();

        $rs = $this->con->ejecutar($query);


        
        $estadisticas = array();


        while($reg = $rs->fetch_array()){
            

            $idEst=$reg[0];
            $fk_pre=$reg[1];
            $cantVopcion1=$reg[2];
            $cantVopcion2=$reg[3];
            $cantVotos=$reg[4];
            
            


            $est = new Estadistica($idEst,$fk_pre,$cantVopcion1,$cantVopcion2,$cantVotos);
            

            $estadisticas[]=$est;


        }


        $this->con->desconectar();

        return $estadisticas;
    }


    public function rescatarPregunta($fk_pre){
        $query= "SELECT * FROM pregunta WHERE id=$fk_pre";

        $this->con->conectar();

        $rs = $this->con->ejecutar($query);


        
        $info = array();


        $reg = $rs->fetch_array();
            

            $idPre=$reg[0];
            $op1=$reg[1];
            $op2=$reg[2];
         
            


            $pre = new Pregunta($idPre,$op1,$op2);
            

            $info[]=$pre;


        


        $this->con->desconectar();

       

        return $info;
    }




}

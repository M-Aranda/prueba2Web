<?php
require_once("Conexion.php");
require_once("Pregunta.php");

class Data{
    private $con;

    public function __construct(){
        $this->con = new Conexion("marcelo_aranda_prueba2");
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


}

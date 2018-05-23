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


        if($reg = $rs->fetch_array()){
            $pregunta = new Pregunta();

            $pregunta->setId($reg[0]);
            $pregunta->setOpcion1($reg[1]);
            $pregunta->setOpcion2($reg[2]);

            array_push($preguntas,$pregunta);


        }

        $this->con->desconectar();
        return $preguntas;
    }






}


<?php
define("ONLINE", false);

class Conexion {

    private $mysql;
    private $bdName;
    private $user;
    private $pass;
    
    public function __construct() {
        if (!ONLINE) {
            $this->bdName = "marcelo_aranda_prueba2";
            $this->user = "root";
            $this->pass = "";
        }else{
            $this->bdName = "id5941957_marcelo_aranda_prueba2";
            $this->user = "id5941957_root";
            $this->pass = "123vetro";
        }
    }

    public function conectar() {
        $this->mysql = new mysqli(
                "localhost", $this->user, $this->pass, $this->bdName
        );

        if (mysqli_connect_errno()) {
            printf("Error de conexión: %s\n", mysqli_connect_error());
            exit();
        }
    }

    public function ejecutar($query) {
        return $this->mysql->query($query);
    }

    public function desconectar() {
        $this->mysql->close();
    }

}


/*

<?php


class Conexion{
    private $mysql;
    private $bdName;
    private $user;
    private $pass;

    public function __construct($bdName){
        $this->bdName = $bdName;
        $this->user = "root";
        $this->pass = "";
    }

    public function conectar(){
        $this->mysql = new mysqli(
            "localhost",
            $this->user,
            $this->pass,
            $this->bdName
        );
        if (mysqli_connect_errno()) {
            printf("Error de conexión: %s\n", mysqli_connect_error());
            exit();
        }
    }

    public function ejecutar($query){
        return $this->mysql->query($query);
    }
    
    public function desconectar(){
        $this->mysql->close();
    }
}

*/
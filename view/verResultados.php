<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resultados</title>
</head>
<body>

<h1>Resultados</h1>


<?php


require_once("../model/Data.php");
require_once("../model/Estadistica.php");
require_once("../model/Pregunta.php");

session_start();

$d= new Data();

$estadisticas=$d->rescatarEstadisticas();

foreach ($estadisticas as $e => $estadistica) {

$pregunta=$d->rescatarPregunta($estadistica->getFk_pre());


$porcOp1=(($estadistica->getCantVotosOpcion1())/($estadistica->getCantVotos()))*100;
$porcOp2=(($estadistica->getCantVotosOpcion2())/($estadistica->getCantVotos()))*100;


echo "<h1> Pregunta ".$estadistica->getFk_pre()."</h1>
     <br>
     <table border=1>
     <tr>
     <td>".$pregunta[0]->getOpcion1()."</td>
     <td>".$porcOp1."%</td>
     </tr>
     <tr>
     <td>".$pregunta[0]->getOpcion2()."</td>
     <td>".$porcOp2."%</td>
     </tr>
     </table>
     <br>
     <h4> Cantidad de votos: ".$estadistica->getCantVotos()."</h4>
     <br>
     <br>";
}



?>








<a href="encuesta.php">Volver</a>


    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Encuesta</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    
</head>
<body>

<h1>Encuesta</h1>

<a href="verResultados.php">Ver resultados</a>
<br>

<form action="../controller/controladorCrearResultado.php" method="post">
<?php

require_once("../model/Data.php");
require_once("../model/Pregunta.php");

session_start();

$d= new Data();

$listadoDePreguntas=$d->rescatarPreguntas();

foreach ($listadoDePreguntas as $p=> $pregunta) {

$pOp=1;
$sOp=2;

    echo "<h1>Pregunta ".$pregunta->getId()."</h1>";
    echo "<br>";
    echo '<input type="submit" name="op['.$pOp.",".$pregunta->getId().']" value="'.$pregunta->getOpcion1().'" />'; 
    echo "<br>";
    echo "<br>";
    echo '<input type="submit" name="op['.$sOp.",".$pregunta->getId().']" value="'.$pregunta->getOpcion2().'" />'; 
    echo "<br>";
    echo "<br>";
    echo "<br>";
}



?>

</form>

<a href="../index.php">Volver al indice</a>


    
</body>
</html>
<?php


require_once("../model/Data.php");
require_once("../model/Resultado.php");



session_start();

/*
$cVotOp1=$_REQUEST["op1"];
$cVotOp2=$_REQUEST["op2"];
$fk_pregunta=$_REQUEST[""];
*/

$dato=key($_POST['op']);
echo $dato;


$division=explode(',',$dato);




$opSeleccionada=array_values($division)[0];
$id_de_pregunta_respondida=array_values($division)[1];



echo "<h1>Se selecciono la opcion ".$opSeleccionada." para la pregunta de id ".$id_de_pregunta_respondida."</h1>";


//echo "$dato";



$d= new Data();





//header("location:../view/encuesta.php");

?>
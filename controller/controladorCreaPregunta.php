<?php


require_once("../model/Data.php");
require_once("../model/Pregunta.php");



session_start();

$opcion1=$_REQUEST["op1"];
$opcion2=$_REQUEST["op2"];




$d= new Data();

$d->crearPregunta($opcion1,$opcion2);


//los headers no funcionan online, cambiar por javascript o meta
header("location:../index.php");

?>
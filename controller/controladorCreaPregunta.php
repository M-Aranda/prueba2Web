<?php


require_once("../model/Data.php");
require_once("../model/Pregunta.php");



session_start();

$opcion1=$_REQUEST["op1"];
$opcion2=$_REQUEST["op2"];




$d= new Data();

$d->crearPregunta($opcion1,$opcion2);



header("location:../index.php");

?>
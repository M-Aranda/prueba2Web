<?php


require_once("../model/Data.php");
require_once("../model/Resultado.php");



session_start();


$dato=key($_POST['op']);




$division=explode(',',$dato);




$opSeleccionada=array_values($division)[0];
$id_de_pregunta_respondida=array_values($division)[1];



//echo "<h1>Se selecciono la opcion ".$opSeleccionada." para la pregunta de id ".$id_de_pregunta_respondida."</h1>";


//echo "$dato";



$d= new Data();

$primeraOpcionSeleccionada=FALSE;
$segundaOpcionSeleccionada=FALSE;

if($opSeleccionada==1){
    $primeraOpcionSeleccionada=TRUE;
    $d->actualizarCantVotosOp1($id_de_pregunta_respondida);

}else if($opSeleccionada==2){
    $segundaOpcionSeleccionada=TRUE;
    $d->actualizarCantVotosOp2($id_de_pregunta_respondida);
}

$d->crearResultado($primeraOpcionSeleccionada,$segundaOpcionSeleccionada,$id_de_pregunta_respondida);
$d->sumarCantVotos($id_de_pregunta_respondida);






header("location:../view/encuesta.php");

?>
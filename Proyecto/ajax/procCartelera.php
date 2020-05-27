<?php 
//Código para procesar el array que contiene los datos de la cartelera
require_once("../bdd/Cine.php");
$arrCartelera = Cartelera::creaListado();
echo json_encode($arrCartelera);

?>
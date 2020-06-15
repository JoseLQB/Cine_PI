<?php 
//Código para procesar el objeto que contiene los datos de la cartelera
require_once("../bdd/Cine.php");
$arrCartelera = Cartelera::creaListado();
echo json_encode($arrCartelera);

?>
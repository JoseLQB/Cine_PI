<?php 
//Codigo para procesar los daos de las tarifas
require_once("../bdd/Tarifas.php");
$arrTarifas = Tarifas::getTarifas();
echo json_encode($arrTarifas);

?>
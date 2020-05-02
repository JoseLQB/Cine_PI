<?php 

require_once("../bdd/Tarifas.php");
$arrTarifas = Tarifas::getTarifas();
echo json_encode($arrTarifas);

?>
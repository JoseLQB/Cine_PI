<?php 

$id = $_GET["varID"];
require_once("../bdd/Proyecciones.php");
$arrProyecciones = Proyecciones::getProyecciones($id);
echo json_encode($arrProyecciones);

?>
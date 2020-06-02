<?php 
//Código para procesar el array que contiene los datos de las proyecciones
require_once("../bdd/Proyecciones.php");
$arrProyecciones = Proyecciones::getProyecciones();
echo json_encode($arrProyecciones);

?>
<?php

session_start();
if (!isset($_SESSION["usuario"])) {
    header("location:muestra.php");
}
require_once("../bdd/CineDB.php");
$conexion = CineDB::conectar(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../inc/head.php"); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="../js/proyecciones.js"></script>

    <title>Registro</title>
</head>

<body class="cartelera">
    <div class="container">
        <div class="row d-flex justify-content-around mt-5">
            <div class="card col-md-6 col-md-offset-6">
                <article class="card-body">
                    <h4>Películas para borrar proyecciones</h4>
                    <?php

                    require_once("../bdd/CineDB.php"); 
                    require_once("../bdd/Cine.php");
                    $conn = CineDB::conectar();
                    $lista  = Cartelera::creaListado();
                    ?> <ul><?php
                    foreach ($lista as $k) {
                       echo "<li><a href='adminBorraProyForm.php?varID=".$k->idPelicula." '>".$k->idPelicula . " - ".$k->titulo."</a></li>";
                    }

                    ?><hr></ul>
                    <a href="administracion.php">Volver</a>
                  <!--  <a href='compra.php?varID=".$reg["idPelicula"].-->
                </article>
            </div>
        </div>
    </div><br><br>
</body>

</html>
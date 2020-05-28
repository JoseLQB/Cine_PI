<?php

session_start();
if (!isset($_SESSION["usuario"])|| ($_SESSION["admin"] ==0)) {
    header("location:muestra.php");
}
require_once("../bdd/CineDB.php");
$conexion = CineDB::conectar(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../inc/head.php"); ?>

    <title>Listado de películas</title>
</head>

<body class="admin">
    <div class="container">
        <div class="row d-flex justify-content-around mt-5">
            <div class="card col-md-6 col-md-offset-6">
                <article class="card-body">
                    <h5>Películas:</h5>
                    <?php

                    require_once("../bdd/CineDB.php"); 
                    require_once("../bdd/Cine.php");
                    $conn = CineDB::conectar();
                    $lista  = Cartelera::creaListado();
                    ?> <ul><?php
                    foreach ($lista as $k) {
                       echo "<li><hr>". $k->idPelicula . " - ".$k->titulo."</li>";
                    }

                    ?><hr></ul>
                    <a href="administracion.php">Volver</a>

                </article>
            </div>
        </div>
    </div><br><br>
</body>

</html>
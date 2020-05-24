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

    <title>Registro</title>
</head>

<body class="cartelera">
    <div class="container">
        <div class="row d-flex justify-content-around mt-5">
            <div class="card col-md-6 col-md-offset-6">
                <article class="card-body">
                    <h5>Películas:</h5>
                    <?php

                    require_once("../bdd/CineDB.php"); 
                    require_once("../bdd/Cine.php");
                    $conn = CineDB::conectar();
                    Cartelera::getListado();
                    ?>
                    <a href="administracion.php">Volver</a>

                </article>
            </div>
        </div>
    </div><br><br>
</body>

</html>
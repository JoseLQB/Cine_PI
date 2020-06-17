<?php

session_start();
if (!isset($_SESSION["usuario"])|| ($_SESSION["admin"] ==0)) {
    header("location:muestra.php");
}
require_once("../bdd/Cine.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../inc/head.php"); ?>

    <title>Nueva proyección</title>
</head>

<body class="admin">
<?php include_once("../inc/navAdmin.php") ?>
    <div class="container">
        <div class="row d-flex justify-content-around mt-5">
            <div class="card col-md-6 col-md-offset-6">
                <article class="card-body">
                    <h4>Añadir nuevas proyecciones</h4><br>
                    <?php
                    $lista  = Cartelera::creaListado();
                    ?> <ul><?php
                    foreach ($lista as $k) {
                       echo "<li><a href='adminFormInsert.php?varID=".$k->idPelicula." '>".$k->titulo."</a></li><br>";
                    }

                    ?><hr></ul>
                    <a href="administracion.php">Volver</a>
                  <!--  <a href='compra.php?varID=".$reg["idPelicula"].-->
                </article>
            </div>
        </div>
    </div><br><br>
</body>

<?php include_once("../inc/footer.php"); ?>

</html>
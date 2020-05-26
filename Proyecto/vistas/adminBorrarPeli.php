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
                    $lista  = Cartelera::creaListado();
                    ?> <div class="row"><?php
                    foreach ($lista as $k) {
                        ?><?php
                       echo "<div class='col-md-6'>". $k->idPelicula . " - ".$k->titulo."</div>";
                       ?>
                       <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" class="form_borra">
                       
                       <input type="hidden" name="idOc" value="<?php echo $k->idPelicula ?>">
                       <button type="submit" name="delete" class="btn btn-danger btn-block">Eliminar</button></form><br><br><?php
                    }

                    ?></div><hr>
                    <a href="administracion.php">Volver</a>

                </article>
            </div>
        </div>
    </div><br><br>
    <?php
    $fetch = 0;
  //  $id = $_POST["idOc"];
    if (isset($_POST["delete"])) {
        require_once("../bdd/CineDB.php");
        require_once("../bdd/Cine.php");
        require_once("../bdd/Proyecciones.php");
        $conn = CineDB::conectar();
        Proyecciones::delete($_POST["idOc"]);
        /** */
        Cartelera::delete($_POST["idOc"]);
        $fetch = 1;
    } else {
        echo "<font color='red'>Introduce todos los datos</font>";
    }
    if($fetch == 1){
        echo '<center><h3><font color="green">¡Nuevo título insertado!</font></h3></center><br>';
    }
    ?>
</body><br><br>

</html>
<?php

session_start();
if (!isset($_SESSION["usuario"])) {
    header("location:muestra.php");
}
require_once("../bdd/CineDB.php");
require_once("../bdd/Cine.php");
require_once("../bdd/Proyecciones.php");
$conexion = CineDB::conectar(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../inc/head.php"); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/proyecciones.js"></script>

    <title>Eliminar proyección</title>
</head>

<body class="admin">
    <div class="container">
        <div class="row d-flex justify-content-around mt-5">
            <div class="card col-md-6 col-md-offset-6">
                <article class="card-body">
                    <h4>Estas son las proyecciones de <?php echo '"' . Cartelera::getTitulo($_GET["varID"]) . '"' ?></h4>
                    <hr>
                    <?php

                    require_once("../bdd/Proyecciones.php");
                    $var = Proyecciones::getProyecciones();
                    //var_dump($var);
                    foreach ($var as $key) {
                        if ($key->idPelicula == $_GET["varID"]) {
                            echo "<h5>Proyección nº " . $key->idProyeccion . ":</h5> Sala " . $key->idSala . ". Fecha: " . $key->fechaProyeccion . ". Hora: " . $key->horaProyeccion . ". Tarifa activa: " . $key->codTarifa;

                    ?>
                            <form action="adminBorraProyForm.php?<?php echo "varID=" . $_GET["varID"]; ?>" method="post" class="form_borra">

                            <input type="hidden" name="idPr" value="<?php echo $key->idProyeccion ?>">
                            <button type="submit" name="delete" class="btn btn-danger btn-sm">Eliminar</button></form>
                            <form action="adminBorraProyForm.php?<?php echo "varID=" . $_GET["varID"]; ?>" method="post" class="form_borra">

                            <input type="hidden" name="idPr" value="<?php echo $key->idProyeccion ?>">
                            <button type="submit" name="update" class="btn btn-success btn-sm">Actualizar</button></form><br><?php

                        }
                    }
                    ?>
                    <hr>
                    </ul>
                    <a href="administracion.php">Volver a administración</a><br>
                    <a href="../index.php">Volver a index</a>
                    <!--  <a href='compra.php?varID=".$reg["idPelicula"].-->
                </article>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST["delete"])) {
        $conn = CineDB::conectar();
        Proyecciones::deletebyProy($_GET["varID"], $_POST["idPr"]);
    } else if (isset($_POST["update"])) {

        foreach ($var as $key) {
            if ($key->idProyeccion == $_POST["idPr"]) {
    ?>

                <div class="container">
                    <div class="row d-flex justify-content-around mt-5">
                        <div class="card col-md-6 col-md-offset-6">
                            <article class="card-body">
                                <h4 class="card-title mb-4 mt-1 text-center">Actualizando la proyección número <?php echo $key->idProyeccion ?></h4>

                                <form action="adminBorraProyForm.php?varID=<?php echo $_GET["varID"]; ?>" method="post" class="form_insert">
                                    <div class="form-group">
                                        <label>ID de la Proyección</label>
                                        <input type="text" class="form-control" name="idProyeccionBlock" placeholder="" value="<?php echo $key->idProyeccion ?>" required disabled>
                                        <input type="hidden" class="form-control" name="idProyeccion" placeholder="" value="<?php echo $key->idProyeccion ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Sala</label>
                                        <input type="text" name="idSala" class="form-control" placeholder="" value="<?php echo $key->idSala ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>ID Pelicula</label>
                                        <input type="text" name="idPeliculaBlock" class="form-control" placeholder="" value="<?php echo $_GET["varID"] ?>" required disabled>
                                        <input type="hidden" name="idPelicula" class="form-control" placeholder="" value="<?php echo $_GET["varID"] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha de la proyección</label>
                                        <input type="date" name="fechaProyeccion" class="form-control" placeholder="" value="<?php echo $key->fechaProyeccion ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Hora de la proyección</label>
                                        <input type="time" name="horaProyeccion" class="form-control" placeholder="" value="<?php echo $key->horaProyeccion ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tarifa</label>
                                        <input type="text" name="codTarifa" class="form-control" placeholder="" value="<?php echo $key->codTarifa ?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="edit" class="btn btn-primary btn-block">Actualizar</buttom>
                                    </div>
                                    <a href="administracion.php">Volver</a>
                                </form>
                                <div id="msg_error" class="alert alert-danger" role="alert" style="display: none"></div>
                                <div id="msg_ok" class="alert alert-danger" role="alert" style="display: none"></div>
                            </article>
                        </div>
                    </div><br>
                </div>
    <?php
            }
        }
    }

    $fetch = 0;
    if (isset($_POST["edit"])) {
        $conn = CineDB::conectar();
        Proyecciones::update($_POST["idProyeccion"], $_POST["idSala"], $_GET["varID"], $_POST["fechaProyeccion"], $_POST["horaProyeccion"], $_POST["codTarifa"]);
        $fetch = 1;
    } else if ($fetch == 1) {
        echo '<center><h3><font color="green">¡Elemento actualizado!</font></h3></center><br>';
    }
    ?>
</body>

</html>
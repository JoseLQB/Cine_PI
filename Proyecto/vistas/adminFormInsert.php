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

    <title>Insertar proyección</title>
</head>

<body class="admin">
    <div class="container">
        <div class="row d-flex justify-content-around mt-5">
            <div class="card col-md-6 col-md-offset-6">
                <article class="card-body">
                    <h4 class="card-title mb-4 mt-1 text-center">Inserta una proyección para la película <?php
                                                                                                            $titulo = Cartelera::getTitulo($_GET["varID"] );
                                                                                                            echo '"'.$titulo.'"'?></h4>

                    <form action="adminFormInsert.php?<?php echo "varID=".$_GET["varID"]; ?>" method="post" class="form_insert">
                        <div class="form-group">
                            <label>ID de la Proyección</label>
                            <input type="text" class="form-control" name="idProyeccion" placeholder="" require>
                        </div>
                        <div class="form-group">
                            <label>Sala</label>
                            <input type="text" name="idSala" class="form-control" placeholder="" require>
                        </div>
                        <div class="form-group">
                            <label>ID Pelicula</label>
                            <input type="text" name="idPelicula" class="form-control" placeholder="" value="<?php echo $_GET["varID"] ?>" require>
                        </div>
                        <div class="form-group">
                            <label>Fecha de la proyección</label>
                            <input type="date" name="fechaProyeccion" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Hora de la proyección</label>
                            <input type="time" name="horaProyeccion" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Tarifa</label>
                            <input type="text" name="codTarifa" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="insert" class="btn btn-primary btn-block">Insertar</buttom>
                        </div>
                        <a href="administracion.php">Volver</a>
                    </form>
                    <div id="msg_error" class="alert alert-danger" role="alert" style="display: none"></div>
                    <div id="msg_ok" class="alert alert-danger" role="alert" style="display: none"></div>
                </article>
            </div>
        </div>
    </div>
    <?php
    $fetch = 0;
    if (isset($_POST["insert"])) {
        $conn = CineDB::conectar();
        Proyecciones::nuevaProyeccion($_POST["idProyeccion"], $_POST["idSala"], $_POST["idPelicula"], $_POST["fechaProyeccion"], $_POST["horaProyeccion"], $_POST["codTarifa"], );
        $fetch = 1;
    } else {
        echo "<font color='red'>Introduce todos los datos</font>";
    }
    if ($fetch == 1) {
        echo '<center><h3><font color="green">¡Nuevo título insertado!</font></h3></center><br>';
    }
    ?><br><br>
</body>

</html>
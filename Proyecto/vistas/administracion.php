<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location:muestra.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../inc/head.php") ?>

    <title>Cartelera</title>
</head>

<body class="cartelera">
    <!--Slide-->



    <?php include_once("../inc/nav.php") ?>

    <section class="row " id="centro">
        <div class="container" style="background-color:yellow">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class=" text-center">PANEL DE ADMINISTRACIÓN</h1>
                </div><br>
            </div><br>
            <div class="col-sm-12">
                <h3 class="text-center">¿Qué quieres hacer?</h3>
            </div><br>
            <div class="row">
                <div class="col-sm-3 text-center">
                    <a href="insertPeli.php"><button type="button" class="btn btn-primary btn-lg">Insertar Película</button></a>
                </div>
                <div class="col-sm-3 text-center">
                    <button type="button" class="btn btn-primary btn-lg">Borrar Película</button>
                </div>
                <div class="col-sm-3 text-center">
                    <a href="insertPeli.php"><button type="button" class="btn btn-primary btn-lg">Editar Película</button></a>
                </div>
                <div class="col-sm-3 text-center">
                    <button type="button" class="btn btn-primary btn-lg">Ver Listado</button>
                </div>
            </div><br>
        </div>
    </section><br>

</body>

<?php include_once("../inc/footer.php"); ?>

</html>
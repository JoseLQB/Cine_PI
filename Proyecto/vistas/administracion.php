<?php
session_start();
if (!isset($_SESSION["usuario"])|| ($_SESSION["admin"] ==0)) {
    header("location:muestra.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../inc/head.php") ?>

    <title>Administración</title>
</head>

<body class="admin">
    <!--Slide-->



    <?php include_once("../inc/nav.php") ?>

    <section class=" " id="centro">
        <div class="container" style="background-color:white">
            <div class="row">
                <div class="col-sm-12">
                    <br><a href="http://localhost/DAW2/buscaPelis/view/vista.php" target="_blank" class=" text-center"><h3>Buscador</h3></a>
                   <br> <h1 class=" text-center">ADMINISTRACIÓN DE CARTELERA</h1>
                </div><br>
            </div><br>
            <div class="col-sm-12">
                <h3 class="text-center">¿Qué quieres hacer?</h3>
            </div><br>
            <div class="row">
                <div class="col-sm-4 text-center">
                    <a href="adminsertPeli.php"><button type="button" class="btn btn-primary btn-lg">Insertar Película</button></a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="adminBorrarPeli.php"><button type="button" class="btn btn-primary btn-lg">Borrar | Actualizar</button></a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="adminListado.php"><button type="button" class="btn btn-primary btn-lg">Ver Listado</button></a>
                </div>
            </div><br><br><hr><br>
        </div>
        <div class="container" style="background-color:white">
            <div class="row ">
                <div class="col-sm-12">
                    <h1 class=" text-center">ADMINISTRACIÓN DE PROYECCIONES</h1>
                </div><br>
            </div><br>
            <div class="col-sm-12">
                <h3 class="text-center">¿Qué quieres hacer?</h3>
            </div><br>
            <div class="row">
                <div class="col-sm-4 text-center">
                    <a href="admininsertProy.php"><button type="button" class="btn btn-primary btn-lg">Insertar Proyeccón</button></a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="adminBorraProy.php"><button type="button" class="btn btn-primary btn-lg">Borrar | Actualizar</button></a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="adminListadoProy.php"><button type="button" class="btn btn-primary btn-lg">Ver Todas</button></a>
                </div>
            </div><br><br>
        </div>
    
    </section><br>

</body>

<?php include_once("../inc/footer.php"); ?>

</html>
<?php

session_start();
if (!isset($_SESSION["usuario"])|| ($_SESSION["admin"] ==0)) {
    header("location:muestra.php");
}
require_once("../bdd/CineDB.php");
require_once("../bdd/Cine.php");
$conexion = CineDB::conectar(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../inc/head.php"); ?>

    <title>Insertar película</title>
</head>
    <div class="container">
<?php include_once("../inc/navAdmin.php") ?>
        <div class="row d-flex justify-content-around mt-5">
            <div class="card col-md-6 col-md-offset-6">
<body class="admin"><br><a href="buscador/buscar.php" target="_blank" class=" text-center"><h3>Buscador de ayuda</h3></a>
                <article class="card-body">
                    <h4 class="card-title mb-4 mt-1 text-center">Inserta los datos de la película</h4>
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" class="form_insert">
                        <div class="form-group">
                            <label>Título</label>
                            <input type="text" class="form-control" name="titulo" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label>Director</label>
                            <input type="text" name="director" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label>Sinopsis</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="genero" require></textarea>
                        </div>
                        <div class="form-group">
                            <label>Pais</label>
                            <input type="text" name="pais" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label>Año de estreno</label>
                            <input type="text" name="ano" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label>Duración</label>
                            <input type="text" name="duracion" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label>Género</label>
                            <input type="text" name="sinopsis" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label>Tráiler</label>
                            <input type="text" name="trailer" class="form-control" value="https://www.youtube.com/embed/" required>
                        </div>
                        <div class="form-group">
                            <label>Cartel</label>
                            <input type="text" name="cartel" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="insert" class="btn btn-primary btn-block">Insertar</buttom>
                        </div>
                        <a href="administracion.php">Volver</a>
                    </form>
                    <div id="msg_error" class="alert alert-danger" role="alert" style="display: none"></div>
                    <div id="msg_ok" class="alert alert-danger" role="alert" style="display: none"></div>
                
    <?php
    $fetch=0;
    if (isset($_POST["insert"])&& isset($_POST["titulo"])&& isset($_POST["cartel"])&& isset($_POST["trailer"])) {
        $fetch = 2;
        Cartelera::nuevaPelicula("", $_POST["pais"], $_POST["sinopsis"], $_POST["duracion"], $_POST["ano"], $_POST["genero"], $_POST["titulo"], $_POST["director"], $_POST["trailer"], $_POST["cartel"]);
        $fetch = 1;
    } 
    if($fetch==2) {
        echo '<div id="msg_error" class="alert alert-danger" role="alert">Introduce todos los datos</div>';
    }else if($fetch == 1){
        echo '<div id="msg_ok" class="alert alert-success" role="alert"><center>Nuevo título insertado</center></div>';
    }
    ?></article>
    </div>
</div>
</div><br><br>
</body>

</html>
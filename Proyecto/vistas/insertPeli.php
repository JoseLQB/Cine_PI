<?php

session_start();
require_once("../bdd/CineDB.php");
$conexion = CineDB::conectar(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../inc/head.php"); ?>

    <title>Registro</title>
</head>
<?php include_once("../inc/nav.php") ?>
<body class="cartelera">
    <div class="container">
        <div class="row d-flex justify-content-around mt-5">
            <div class="card col-md-6 col-md-offset-6">
                <article class="card-body">
                    <h4 class="card-title mb-4 mt-1 text-center">Inserta los datos de la película</h4>
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" class="form_insert">
                        <div class="form-group">
                            <label>Título</label>
                            <input type="text" class="form-control" name="titulo" placeholder="" require>
                        </div>
                        <div class="form-group">
                            <label>Director</label>
                            <input type="text" name="director" class="form-control" placeholder="" require>
                        </div>
                        <div class="form-group">
                            <label>Sinopsis</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="genero"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Pais</label>
                            <input type="text" name="pais" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Año de estreno</label>
                            <input type="text" name="ano" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Duración</label>
                            <input type="text" name="duracion" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Género</label>
                            <input type="text" name="sinopsis" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Tráiler</label>
                            <input type="text" name="ano" class="form-control" placeholder="https://www.youtube.com/embed/**********">
                        </div>
                        <div class="form-group">
                            <label>Cartel</label>
                            <input type="text" name="ano" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Año de estreno</label>
                            <input type="text" name="ano" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="insert" class="btn btn-primary btn-block">Insertar</buttom>
                        </div>
                        <a href="muestra.php">Volver</a>
                    </form>
                    <div id="msg_error" class="alert alert-danger" role="alert" style="display: none"></div>
                    <div id="msg_ok" class="alert alert-danger" role="alert" style="display: none"></div>
                </article>
            </div>
        </div>
    </div>
    <?php

    ?><br><br>
</body>
<?php include_once("../inc/footer.php"); ?>

</html>
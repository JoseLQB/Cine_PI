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

    <title>Editar película</title>
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
                    ?> <div class="row"><?php
                    foreach ($lista as $k) {
                        ?><?php
                       echo "<div class='col-md-6'>". $k->idPelicula . " - ".$k->titulo."</div>";
                       ?>
                       <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" class="form_borra">
                       
                       <input type="hidden" name="idOc" value="<?php echo $k->idPelicula ?>">
                       <button type="submit" name="delete" class="btn btn-danger btn-block">Eliminar</button></form>&nbsp; &nbsp; &nbsp;
                       <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" class="form_borra">
                       
                       <input type="hidden" name="idOc" value="<?php echo $k->idPelicula ?>">
                       <button type="submit" name="update" class="btn btn-warning btn-block">Actualizar</button></form><br><br><?php
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
        $conn = CineDB::conectar();
        Proyecciones::delete($_POST["idOc"]);
        /** */
        Cartelera::delete($_POST["idOc"]);
        $fetch = 1;
    }/* else {
        echo "<font color='red'>Introduce todos los datos</font>";
    }*/
    if($fetch == 1){
        echo '<center><h3><font color="red">¡Elemento eliminado!</font></h3></center><br>';
    }else if(isset($_POST["update"])){
       // echo "hola" . $_POST["idOc"];
        ?>
        <div class="container">
            <div class="row d-flex justify-content-around mt-5">
                <div class="card col-md-6 col-md-offset-6">
                    <article class="card-body">
                        <h4 class="card-title mb-4 mt-1 text-center">Estás editando <?php echo '"'.Cartelera::getTitulo($_POST["idOc"]).'"'?></h4>
                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" class="form_insert">
                            <div class="form-group">
                                <label>ID</label>
                                <input type="text" class="form-control" name="id" placeholder="" value="<?php echo $_POST["idOc"]?>" require>
                            </div>
                            <div class="form-group">
                                <label>Título</label>
                                <input type="text" class="form-control" name="titulo" placeholder="" value="<?php echo Cartelera::getTitulo($_POST["idOc"])?>" require>
                            </div>
                            <div class="form-group">
                                <label>Director</label>
                                <input type="text" name="director" class="form-control"  placeholder="" value="<?php echo Cartelera::getDirector($_POST["idOc"])?>" require>
                            </div>
                            <div class="form-group">
                                <label>Sinopsis</label>
                                <textarea class="form-control" id="" rows="3" name="genero" placeholder="" value="" ><?php echo Cartelera::getSinopsis($_POST["idOc"])?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Pais</label>
                                <input type="text" name="pais" class="form-control"  placeholder="" value="<?php echo Cartelera::getPais($_POST["idOc"])?>"  require>
                            </div>
                            <div class="form-group">
                                <label>Año de estreno</label>
                                <input type="text" name="ano" class="form-control" placeholder="" value="<?php echo Cartelera::getFecha($_POST["idOc"])?>">
                            </div>
                            <div class="form-group">
                                <label>Duración</label>
                                <input type="text" name="duracion" class="form-control" placeholder="" value="<?php echo Cartelera::getDuracion($_POST["idOc"])?>">
                            </div>
                            <div class="form-group">
                                <label>Género</label>
                                <input type="text" name="sinopsis" class="form-control" placeholder="" value="<?php echo Cartelera::getGenero($_POST["idOc"])?>">
                            </div>
                            <div class="form-group">
                                <label>Tráiler</label>
                                <input type="text" name="trailer" class="form-control" placeholder="" value="<?php echo Cartelera::getTrailer($_POST["idOc"])?>">
                            </div>
                            <div class="form-group">
                                <label>Cartel</label>
                                <input type="text" name="cartel" class="form-control" placeholder="" value="<?php echo Cartelera::getCartel($_POST["idOc"])?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="edit" class="btn btn-warning btn-block">Actualizar</buttom>
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
    }
    ?><?php
    $fetch = 0;
    if (isset($_POST["edit"])) {
        $conn = CineDB::conectar();
        Cartelera::update($_POST["id"],$_POST["pais"], $_POST["sinopsis"], $_POST["duracion"], $_POST["ano"], $_POST["genero"], $_POST["titulo"], $_POST["director"], $_POST["trailer"], $_POST["cartel"]);
        $fetch = 1;
    } else {
        echo "<font color='red'>Introduce todos los datos</font>";
    }
    if($fetch == 1){
        echo '<center><h3><font color="green">¡Elemento actualizado!</font></h3></center><br>';
    }
    ?>
</body><br><br>

</html>
<?php

session_start();
if (!isset($_SESSION["usuario"])) {
    header("location:muestra.php");
}
require_once("../bdd/Cine.php");
require_once("../bdd/Proyecciones.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../inc/head.php"); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/proyecciones.js"></script>

    <title>Eliminar proyección</title>
</head>

<body class="admin">
    <?php include_once("../inc/navAdmin.php") ?>
    <?php
    $fetch = 0;
    $men = "";
    if (isset($_POST["delete"])) {
        Proyecciones::deletebyProy($_GET["varID"], $_POST["idPr"]);
        $fetch = 1;
    }else if (isset($_POST["edit"])) {
        Proyecciones::update($_POST["idProyeccion"], $_POST["idSala"], $_GET["varID"], $_POST["fechaProyeccion"], $_POST["horaProyeccion"], $_POST["codTarifa"]);
        $fetch = 2;
    }
    if($fetch == 1){
        $men = '<div id="msg_error" class="alert alert-danger" role="alert" ><center>Proyección eliminada</center></div>';
    }else if($fetch ==2){
        $men = '<div id="msg_error" class="alert alert-success" role="alert" ><center>Proyección actualizada</center></div>';
    }

    ?>
    <div class="container">
        <div class="row d-flex justify-content-around mt-5">
            <div class="card col-md-6 col-md-offset-6">
                <article class="card-body">
                    <h4>Estas son las proyecciones de <?php echo '"' . Cartelera::getTitulo($_GET["varID"]) . '"' ?></h4>
                    <?php echo $men;?>
                    <hr>
                    <?php

                    require_once("../bdd/Proyecciones.php");
                    $var = Proyecciones::getProyecciones();
                    foreach ($var as $key) {
                        if ($key->idPelicula == $_GET["varID"]) {
                            echo "<h5>Proyección nº " . $key->idProyeccion . ":</h5> Sala " . $key->idSala . ". Fecha: " . $key->fechaProyeccion . ". Hora: " . $key->horaProyeccion . ". Tarifa activa: " . $key->codTarifa;

                    ?>
                            <form action="adminBorraProyForm.php?<?php echo "varID=" . $_GET["varID"]; ?>" method="post" class="form_borra">
                                <input type="hidden" name="idPr" value="<?php echo $key->idProyeccion ?>">
                                <button type="submit" name="delete" class="btn btn-danger btn-block">Eliminar</button>
                            </form>
                            <form action="adminBorraProyForm.php?<?php echo "varID=" . $_GET["varID"]; ?>#hh" method="post" class="form_borra">
                                <input type="hidden" name="idPr" value="<?php echo $key->idProyeccion ?>">
                                <button type="submit" name="update" class="btn btn-success btn-block">Actualizar</button>
                            </form><br>
                    <?php

                        }
                    }
                    $r = $_GET["varID"]
                    ?>
                    <hr>
                    </ul>
                    <a href="administracion.php">Volver a administración</a><br>
                    <a href="../index.php">Volver a index</a>
                    <!--  <a href='compra.php?varID=".$reg["idPelicula"].-->
                </article>
            </div>
        </div><span id="hh"></span>
    </div><br>
    <?php
    if (isset($_POST["update"])) {

        foreach ($var as $key) {
            if ($key->idProyeccion == $_POST["idPr"]) {
    ?>
                <div class="container">
                    <div class="row d-flex justify-content-around mt-5">
                        <div class="card col-md-6 col-md-offset-6">
                            <article class="card-body">
                                <h4 class="card-title mb-4 mt-1 text-center">Actualizando la proyección número <?php echo $key->idProyeccion ?></h4>

                                <form action="adminBorraProyForm.php?varID=<?php echo $r; ?>" method="post" class="form_insert">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="idProyeccionBlock" placeholder="" value="<?php echo $key->idProyeccion ?>" required disabled>
                                        <input type="hidden" class="form-control" name="idProyeccion" placeholder="" value="<?php echo $key->idProyeccion ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Sala</label>
                                        <select name="idSala">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="idPeliculaBlock" class="form-control" placeholder="" value="<?php echo $r ?>" required disabled>
                                        <input type="hidden" name="idPelicula" class="form-control" placeholder="" value="<?php echo $r ?>">
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

                                        <label>Tarifa</label><br>
                                        <select name="codTarifa">
                                            <option value="NORMAL">Normal</option>
                                            <option value="MATINA">Matinal</option>
                                            <option value="ESPECT">Día del espectador</option>
                                            <option value="PAREJA">Día de la pareja</option>
                                            <option value="SALA3D">Sala 3D</option>
                                        </select>
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

    ?>
</body>

<?php include_once("../inc/footer.php"); ?>

</html>
<?php

session_start();
if (!isset($_SESSION["usuario"]) || ($_SESSION["admin"] == 0)) {
    header("location:muestra.php");
}
require_once("../bdd/Cine.php");
require_once("../bdd/Proyecciones.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../inc/head.php"); ?>

    <title>Insertar proyección</title>
</head>

<?php
$fetch = 0;
$insert = "";
if (isset($_POST["insert"])) {
    $fetch = 2;
    //Esto soluciona un error que cometí al crear la base de datos y creaba un conflicto a la hora de introducir la id de la proyección
    $comprueba = 0;
    if ($comprueba == 0) {

        $arr = Proyecciones::getProyecciones();
        $max = 0;
        foreach ($arr as $key) {
            if ($key->idProyeccion >= $max) {
                $max = $key->idProyeccion + 1;
            }
        }
        Proyecciones::nuevaProyeccion($max, $_POST["idSala"], $_GET["varID"], $_POST["fechaProyeccion"], $_POST["horaProyeccion"], $_POST["codTarifa"]);
        $fetch = 1;
        $insert = '<div id="msg_ok" class="alert alert-danger" role="alert" >Ha habido un problema</div>';
    } else {
        $mensaje = "Errror";
    }
}
if ($fetch == 1) {
    $insert = '<div id="msg_ok" class="alert alert-success" role="alert" >Proyección insertada</div>';
}
?>

<body class="admin">
    <?php include_once("../inc/navAdmin.php") ?>
    <div class="container">
        <div class="row d-flex justify-content-around mt-5">
            <div class="card col-md-6 col-md-offset-6">
                <article class="card-body">
                    <h4 class="card-title mb-4 mt-1 text-center">
                        <?php echo $insert ?>Inserta una proyección para la película
                        <?php
                        $titulo = Cartelera::getTitulo($_GET["varID"]);
                        echo '"' . $titulo . '"' ?></h4>

                    <form action="adminFormInsert.php?<?php echo "varID=" . $_GET["varID"]; ?>" method="post" class="form_insert">

                        <label for=""></label>
                        <div class="form-group">
                            <label>Sala</label>
                            <select name="idSala">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="idPelicula" class="form-control" placeholder="" disabled value="<?php echo $_GET["varID"] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Fecha de la proyección</label>
                            <input type="date" name="fechaProyeccion" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label>Hora de la proyección</label>
                            <input type="time" name="horaProyeccion" class="form-control" placeholder="" required>
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
                            <button type="submit" name="insert" class="btn btn-primary btn-block">Insertar</buttom>
                        </div>
                        <a href="administracion.php">Volver</a>
                    </form>
                </article>
            </div>
        </div>
    </div><br><br>
</body>

<?php include_once("../inc/footer.php"); ?>

</html>
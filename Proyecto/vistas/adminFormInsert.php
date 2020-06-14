<?php

session_start();
if (!isset($_SESSION["usuario"]) || ($_SESSION["admin"] == 0)) {
    header("location:muestra.php");
}
require_once("../bdd/Cine.php");
require_once("../bdd/Proyecciones.php");
$conexion = CineDB::conectar(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../inc/head.php"); ?>

    <title>Insertar proyección</title>
</head>

<?php
$fetch = 0;
if (isset($_POST["insert"])) {
    $fetch = 2;
    $comprueba = Proyecciones::consultaIdProy($_POST["idProyeccion"]);
    if ($comprueba == 0) {
        Proyecciones::nuevaProyeccion($_POST["idProyeccion"], $_POST["idSala"], $_GET["varID"], $_POST["fechaProyeccion"], $_POST["horaProyeccion"], $_POST["codTarifa"]);
        $fetch = 1;
    } else {
        echo "<center><h3><font color='red'>Ya existe una proyección con esa ID</font></center><br>";
    }
}
if ($fetch == 1) {
    echo '<center><h3><font color="green">¡Nueva proyección insertada!</font></h3></center><br>';
}
?>

<body class="admin">
<?php include_once("../inc/navAdmin.php") ?>
    <div class="container">
        <div class="row d-flex justify-content-around mt-5">
            <div class="card col-md-6 col-md-offset-6">
                <article class="card-body">
                    <h4 class="card-title mb-4 mt-1 text-center">Inserta una proyección para la película <?php
                                                                                                            $titulo = Cartelera::getTitulo($_GET["varID"]);
                                                                                                            echo '"' . $titulo . '"' ?></h4>

                    <form action="adminFormInsert.php?<?php echo "varID=" . $_GET["varID"]; ?>" method="post" class="form_insert">
                        <div class="form-group">
                            <label>ID de la Proyección</label>
                            <input type="text" class="form-control" name="idProyeccion" placeholder="" required>
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

</html>
<?php
session_start();
require_once("../bdd/Reserva.php");
require_once("../bdd/Valoraciones.php");
if (!isset($_SESSION["usuario"])) {
    header("location:muestra.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../inc/head.php") ?>

    <title>Cartelera</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<body class="csartelera">
  <section class="justify-content-around" id="centro">
    <?php include_once("../inc/nav.php") ?><br><br>
    <?php


    if (isset($_POST["val"])) {
        $confirm = Valoraciones::getConfirm($_SESSION["id"], $_POST["idPeli"]);
        if ($confirm == 0) {
            Valoraciones::insertaValoracion($_SESSION["id"], $_POST["idPeli"], $_POST["valoracion"]);
        } else if ($confirm == 1) {
            Valoraciones::update($_SESSION["id"], $_POST["idPeli"], $_POST["valoracion"]);
        }
    }
    ?>
    <div class="container">
        <div class="row intConf">
            <div class="p-4 col-lg-4">
                <h4 class="mb-3">Entradas adquiridas</h4>
                <ul class="">
                    <?php
                    $arrayReservas = Reserva::getProyecciones($_SESSION["id"]);
                    foreach ($arrayReservas as $k) {
                        echo "
                 <li class='my-1'>" . Cartelera::getTitulo(Proyecciones::getIDPeliByPro($k[0])) . "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br>Cantidad: " . Reserva::getProyeccionesCompradas($k[0], $_SESSION["id"])[0] . "<br>" . Proyecciones::getFechaProyeccionByPro($k[0]) . "&nbsp;&nbsp;  &nbsp; -&nbsp; " . Proyecciones::getHoraProyeccionByPro($k[0]);
                    }
                    ?>
                </ul>
            </div>
            <div class="p-md-4 col-lg-4">
                <h4 class="mb-3">Valora tus películas</h4>
                <div class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light" role="listbox">

                    </div>
                </div>
                <img class="img-fluid d-block" src="https://m.media-amazon.com/images/M/MV5BNzVlY2MwMjktM2E4OS00Y2Y3LWE3ZjctYzhkZGM3YzA1ZWM2XkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SY1000_CR0,0,643,1000_AL_.jpg">
            </div>
            <div class="col-md-4"><?php
                                    //Controla que, en caso de que haya comprado varias sesiones de la misma película solo aparezca una para votar
                                    $cont = 0;
                                    $tituloNoRepeat = [];

                                    foreach ($arrayReservas as $k) {
                                        $titulo = Cartelera::getTitulo(Proyecciones::getIDPeliByPro($k[0]));
                                        $tituloNoRepeat[$cont] = $titulo;
                                        $cont++;
                                    }
                                    $lista_simple = array_values(array_unique($tituloNoRepeat));
                                    foreach ($lista_simple as $v) {
                                        echo "<form action='perfilUsuario.php' method='post'><br><h4 class=''>" . $v
                                    ?></h4>

                    <div class="form-group"> <label>Nota</label> <input type="number" name="valoracion" min="0" max="10" class="form-control" placeholder="<?php echo Valoraciones::getVal($_SESSION["id"], Cartelera::getIDbyTitle($v))[0]; ?>"> </div> <button type="submit" name="val" class="btn mt-4 btn-block btn-outline-dark p-2"><b>Valorar</b></button>
                    <input type="hidden" name="idPeli" value="<?php echo Cartelera::getIDbyTitle($v)  ?>">
                    </form>
                <?php
                                    }


                ?>
            </div>
        </div>
    </div><br><br>
    </div></section>
</body>

<?php include_once("../inc/footer.php"); ?>

</html>
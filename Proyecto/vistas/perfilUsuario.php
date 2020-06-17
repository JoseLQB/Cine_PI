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
                        //Devuelve todo el historial de reservas del usuario
                        $arrayReservas = Reserva::getProyecciones($_SESSION["id"]);
                        foreach ($arrayReservas as $k) {
                            echo "<li class='my-1'>" . Cartelera::getTitulo(Proyecciones::getIDPeliByPro($k[0])) . "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br>Cantidad: " . Reserva::getProyeccionesCompradas($k[0], $_SESSION["id"])[0] . "<br>" . Proyecciones::getFechaProyeccionByPro($k[0]) . "&nbsp;&nbsp;  &nbsp; -&nbsp; " . Proyecciones::getHoraProyeccionByPro($k[0]);
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
                    <img class="img-fluid d-block contF" src="../assets/images/fondoVoto.jpg">
                </div>
                <div class="p-4 col-md-4">
                    <?php
                    //Controla que, en caso de que haya comprado varias sesiones de la misma película solo aparezca una para votar
                    $cont = 0;
                    $tituloNoRepeat = [];
                    //Genera el formulario con todas las películas para votar.
                    foreach ($arrayReservas as $k) {
                        $titulo = Cartelera::getTitulo(Proyecciones::getIDPeliByPro($k[0]));
                        $tituloNoRepeat[$cont] = $titulo;
                        $cont++;
                        //Solo se pueden votar las películas que ya se han visto, si aun no ha llegado el día de emisión el formulario aparecerá deshabilitado
                        if (Proyecciones::getFechaProyeccionByPro($k[0]) > date("Y-m-d")) {
                            echo "<h4>" . $titulo . "</h4>"; ?>
                            <form action='perfilUsuario.php' method='post'>
                                <div class="form-group">
                                    <label for="">Nota</label>
                                    <input type="number" disabled name="valoracion" min="0" max="10" class="form-control" placeholder="Todavía no puedes votar esta película">
                                </div>
                                <button type="submit" disabled name="val" class="btn mt-4 btn-block btn-outline-dark p-2"><b>Valorar</b></button>
                                <hr>
                                <input type="hidden" name="idPeli" value="<?php echo Cartelera::getIDbyTitle($titulo)  ?>">
                            </form>
                        <?php
                        
                        }else {
                            echo "<h4>" . $titulo . "</h4>"; ?>
                            <form action='perfilUsuario.php' method='post'>
                                <div class="form-group">
                                    <label for="">Nota</label>
                                    <input type="number" name="valoracion" min="0" max="10" class="form-control" placeholder="<?php echo Valoraciones::getVal($_SESSION["id"], Cartelera::getIDbyTitle($titulo))[0]; ?>">
                                </div>
                                <button type="submit" name="val" class="btn mt-4 btn-block btn-outline-dark p-2"><b>Valorar</b></button>
                                <hr>
                                <input type="hidden" name="idPeli" value="<?php echo Cartelera::getIDbyTitle($titulo)  ?>">
                            </form>
                    <?php
                        }
                    } ?>
                </div>
            </div>
        </div><br><br>
        </div>
    </section>
</body>

<?php include_once("../inc/footer.php"); ?>

</html>
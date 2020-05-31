<?php
session_start();
require_once("../bdd/Cine.php");
require_once("../bdd/Proyecciones.php");
require_once("../bdd/Reserva.php");
if (!isset($_SESSION["cantidad"])) {
    header("location:muestra.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../inc/head.php") ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/proyecciones.js"></script>

    <title>Compra</title>
</head>

<body>
    <?php include_once("../inc/nav.php") ?>

    <div class="container">
        <?php
        Reserva::nuevaProyeccion($_SESSION["id"], $_SESSION["idPro"],  (int) $_SESSION["cantidad"]);

        $cantidad = $_SESSION["cantidad"];
        unset($_SESSION["cantidad"]);

        ?> <div class="col-md-6 order-md-2 intConf">
            <h4 class="d-flex justify-content-between mb-3"> <span class="text-muted"><b>Tu compra</b></span> <span class="badge badge-secondary badge-pill"></span> </h4>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between">
                    <div>
                        <h6 class="my-0"><b> <?php
                                                echo $_SESSION["titulo"]; ?></b></h6> <small class="text-muted">Número de sala: <?php echo $_SESSION["sala"] ?></small>
                    </div> <span class="text-muted"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <div>
                        <h6 class="my-0"><?php echo $_SESSION["fecha"] ?></h6> <span class="text-muted"><?php echo $_SESSION["hora"] ?></span>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                        <h6 class="my-0"><b>Tarifa</b></h6> <small>ESPECTADOR</small>
                    </div> <span class="text-success"><?php echo $_SESSION["precio"] ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <div>
                        <h7 class="my-0"><b>Cantidad</b></h7> <small class="text-muted"></small>
                    </div> <span class="text-muted">x <?php
                                                        echo $cantidad; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between"> <span>Total (€)</span> <b>
                        <?php

                        $total = $_SESSION["precio"] * $cantidad;
                        echo $total . "€";

                        ?>



                    </b> </li>
            </ul><br>
        <a href="muestra.php"><h3>VOLVER</h3></a><br><br>
        </div>
        </div>
    </div>
</body>
<?php include_once("../inc/footer.php") ?>

</html>
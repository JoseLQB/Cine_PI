<?php
session_start();
require_once("../bdd/Cine.php");
require_once("../bdd/Proyecciones.php");
require_once("../bdd/Tarifas.php");
require_once("../bdd/Reserva.php"); 
//Controlamos que se vacíe la sesion "cantidad" para poder rectificar en la compra
if (isset($_SESSION["cantidad"])) {
    unset($_SESSION["cantidad"]);
}?>
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
    <div class="row mb-3"></div>
    <div class="row">
      <div class="p-4 col-lg-8">
        <form action="compraConfirm.php" method="POST">
          <h5 class=""><b>Comprando entradas para:
              <?php
              $id = $_GET["varID"];
              $titulo = Cartelera::getTitulo($id);
              echo "<h5>" . $titulo . "<br>";

              ?></b><hr>Proyeccion:<br><?php $objProyeccion = Proyecciones::getProyeccionesById($_POST["idPr"]);

                                          foreach ($objProyeccion as $k) {
                                            $fecha = $k->fechaProyeccion;
                                            $hora = $k->horaProyeccion;
                                            echo  $fecha . " &nbsp;|&nbsp; " . $hora;
                                          } ?><br><br>Sala <?php foreach ($objProyeccion as $k) {
                                                              $sala = $k->idSala;
                                                              echo  $sala;
                                                            }

                                                            ?><br><br>Tarifa que se aplica:<br><?php
                                                                foreach ($objProyeccion as $k) {
                                                                  $tar = $k->codTarifa;
                                                                }
                                                                $objTarifas = Tarifas::getTarifasByCod($tar);
                                                                foreach ($objTarifas as $l) {
                                                                  $tarifa = $l->nombre;
                                                                  echo  $tarifa;
                                                                }

                                                                ?><br><br>Precio por unidad:<br><?php

                                                            $objTarifas = Tarifas::getTarifasByCod($tar);
                                                            foreach ($objTarifas as $m) {
                                                              $precio = $m->precio;
                                                              echo $precio . "€";
                                                            }

                                                            ?><br><br>Actualmente quedan <?php
                                                          $idSala = Reserva::getSala($_POST["idPr"])[0];
                                                          $aforo = Reserva::getAforo($idSala)[0];
                                                          $resto = Reserva::getResto($_POST["idPr"])[0];
                                                          $total = $aforo - $resto;
                                                          echo  $total . "/" . $aforo . " asientos disponibles.";
                                                          ?><br><br>Selecciona la cantidad que vas a comprar <?php
                                                                                $cantidad = 0;
                                                                                ?>
            <input type="number" name="cantidad" min="0" max="<?php echo $total ?>" id="" required> 
            <br><hr><button type="submit" class="btn btn-secondary btn-sm" name="comprar" data-toggle="modal" data-target="#myModal">Comprar</button></h5>
          <?php
          $_SESSION["idPro"] = $_POST["idPr"];
          $_SESSION["titulo"] = $titulo;
          $_SESSION["sala"] = $sala;
          $_SESSION["fecha"] = $fecha;
          $_SESSION["hora"] = $hora;
          $_SESSION["sala"] = $sala;
          $_SESSION["precio"] = $precio;
          $_SESSION["tarifa"] = $tarifa;

          ?>
        </form>
      </div>
      <div class="col-md-4"><img class="img-fluid d-block" src="<?php echo Cartelera::getCartel($id); ?>" ><br><br>
    </div>
  </div>
  </div>
</body>
<?php include_once("../inc/footer.php") ?>

</html>
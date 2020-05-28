<?php
session_start();
require_once("../bdd/Cine.php"); 
require_once("../bdd/Proyecciones.php");
require_once("../bdd/Reserva.php"); ?>
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
  <div class="container-fluid cont-compra">
    <div class="row">
      <div class="col-sm-6 col-md-8">
        <dl>
          <dd><br>
          <h4>Comprando entradas para:</h4>
            <?php
            $id = $_GET["varID"];
            $titulo = Cartelera::getTitulo($id);
            echo "<h5>" . $titulo . "<br>" ;
            echo Cartelera::getFecha($id);
            echo "<br>Proyección: ".$_POST["idPr"];

            ?>
          </dd>
          <dd>
            <p>Tarifa aplicable:</p>


          </dd>
          <dd>
            <p>Cantidad:</p>
            <p>
            <?php 
            $idSala = Reserva::getSala($_POST["idPr"])[0];
            $aforo = Reserva::getAforo($idSala)[0];
            $resto= Reserva::getResto($_POST["idPr"])[0];
            $total = $aforo - $resto;
            echo "Quedan " .  $total . "/". $aforo." asientos disponibles.";
            ?>
            </p>

          </dd>
          <dd>
            <p>Tarifa que se aplica:</p>

          </dd>
          <dd>
            <p>Precio:</p>

          </dd>
          <dd>
            <p>Método de pago:</p>

          </dd>

          
        

        </dl>
      </div>


    </div>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#myModal">Comprar</button>

    <!-- Modal -->
   <br><br><br>
  </div>

</body>
<?php include_once("../inc/footer.php") ?>

</html>
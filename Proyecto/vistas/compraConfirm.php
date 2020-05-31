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

<body class="backConf">
  <?php include_once("../inc/nav.php") 
  ?>    <?php 

 if(!isset($_SESSION["cantidad"] ) ){
  $_SESSION["cantidad"]  = $_POST["cantidad"];
 }


/* $_SESSION["proyeccion"] = $result->nombre;
 $_SESSION["mail"] = $result->mail;
 $_SESSION["admin"] = $result->admin;*/

?>
  <div>
    <div class="container ">
      <div class="row intConf">
        <div class="col-md-4 order-md-2 intConf">
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
              </div> <span class="text-success"><?php  echo $_SESSION["precio"] ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <div>
                <h7 class="my-0"><b>Cantidad</b></h7> <small class="text-muted"></small>
              </div> <span class="text-muted">x <?php 
  echo $_SESSION["cantidad"] ; ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between"> <span>Total (€)</span> <b>
                <?php

                $total = $_SESSION["precio"] *$_SESSION["cantidad"] ;
                echo $total . "€";

                ?>



              </b> </li>
          </ul>
        </div>
        <div class="col-md-8 order-md-1">
          <form action="compraExito.php" method="POST">
            <h4 class="mb-3"><b>Datos de tu compra</b></h4>
            <hr class="mb-4">
            <h4 class="mb-3"><b>Forma de pago</b></h4>
            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="" value="on"> <label class="custom-control-label" for="credit">Tarjeta de crédito</label> </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="" value="on"> <label class="custom-control-label" for="debit">Tarjeta de débito</label> </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="" value="on"> <label class="custom-control-label" for="paypal">Paypal</label> </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3"> <label for="cc-name">Nombre en la tarjeta</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required=""> <small class="text-muted">Nombre completo del usuario de la tarjeta</small>
                <div class="invalid-feedback">Es necesario que introduzcas tu nombre </div>
              </div>
              <div class="col-md-6 mb-3"> <label for="cc-number">Número de la tarjeta</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                <div class="invalid-feedback"> Es necesario que introduzcas el número de tu tarjeta </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3"> <label for="cc-expiration">Caducidad</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                <div class="invalid-feedback"> Es necesario introducir la fecha de caducidad </div>
              </div>
              <div class="col-md-3 mb-3"> <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                <div class="invalid-feedback"> Número de seguridad requerido </div>
              </div>
            </div>
            <hr class="mb-4">
            <button  name="confComprar" class="btn btn-primary btn-lg btn-block" >Confirmar compra</button>
          </form>
          <br>
        </div>
      </div>
    </div><br><br><br>

  </div>
  <?php

  ?>

</body>
<?php include_once("../inc/footer.php") ?>

</html>
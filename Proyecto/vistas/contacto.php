<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once("../inc/head.php") ?>

  <title>Contacto</title>

  <script src="../js/validaciones.js"></script>

</head>
<style>
</style>

<body class="cartelera">
  <!--Slide-->
  <?php include_once("../inc/nav.php") ?><br><br>
  <section class="justify-content-around" id="centro">
    <div class="py-3">
      <div class="container contF">
        <div class="row rowCont">
          <div class="col-md-8 p-4">
            <h1>Contacta con nosotros</h1>
            <p>Si tienes alguna duda, sugerencia, queja o simplemente quieres decirnos algo, aquí te dejamos las distintas vías de contacto.</p>
          </div>
        </div>
        <div class="row rowCont">
          <div class="col-md-5 p-4">
            <p class="lead mt-3"> <img class="phone" src="../assets/images/phone.png" alt=""><b>&nbsp;Teléfono
              </b> </p>
            <p><a href="tel:+34954541123">954541123</a> </p>
            <p><a href="tel:+34652222570">652222545</a> </p>
            <p class="lead mt-3"> <img class="mail" src="../assets/images/mail.png" alt=""><b>&nbsp;Correo</b> </p>
            <p> <a href="mailto:cinepipsur@gmail.com">cinepipsur@gmail.com</a> </p>
            <p> <a href="mailto:cinepi@cinepi.com">cinepi@cinepi.com</a> </p>
          </div>
          <div class="col-md-7 p-4">

            <?php if (isset($_GET["conf"])) {
              echo "<center><h3 class='mb-3' style='color:green'>Mensaje enviado con éxito</h3></center>";
            } else {
              echo "";
            } ?>
            <h3 class="mb-3"><img class="formu" src="../assets/images/form.png" alt="">&nbsp;Formulario de contacto</h3>
            <form id="formContact" action="../controllers/enviaMails.php" method="POST">
              <div class="form-row">
                <div class="form-group col-md-6"> <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required> </div>
                <div class="form-group col-md-6"> <input type="text" class="form-control" id="apellido" name="apellidos" placeholder="Apellido" required> </div>
              </div>
              <div class="form-group"> <input type="text" class="form-control" id="motivo" placeholder="Motivo del mensaje" name="asunto" required> </div>
              <div class="form-group"> <input type="email" class="form-control" id="correo" placeholder="Correo" name="email" required> </div>
              <div class="form-row">
                <div class="form-group col-md-6"> <input type="tel" class="form-control" id="tlf" placeholder="Teléfono de contacto" name="telefono" pattern="[0-9]{9}" title="Número de teléfono válido" required> </div>
                <div class="form-group col-md-6"> <input type="text" class="form-control" id="poblacion" placeholder="Población" name="pob"> </div>
              </div>
              <div class="form-group"> <textarea class="form-control" id="mensaje" rows="4" placeholder="Tu mensaje" name="msg" required></textarea> </div>
              <button class="btn btn-outline-dark envia" type="submit" name="enviaContacto"> Enviar &nbsp;<i class="fa fa-send-o"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </section><br>

</body>

<?php include_once("../inc/footer.php"); ?>

</html>
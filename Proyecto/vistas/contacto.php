<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../inc/head.php") ?>

    <title>Contacto</title>

</head>
<style>
</style>

<body class="cartelera">
    <!--Slide-->



    <?php include_once("../inc/nav.php") ?>

    <section class="justify-content-around" id="centro">



        <div class="py-3" >
    <div class="container">
      <div class="row rowCont">
        <div class="col-md-8 p-4">
          <h1>Contacta con nosotros</h1>
          <p>Si tienes alguna duda, sugerencia, queja o simplemente quieres decirnos algo, aquí te dejamos las distintas vías de contacto.</p>
        </div>
      </div>
      <div class="row rowCont">
        <div class="col-md-5 p-4">
          <p class="lead mt-3"> <b>Teléfono
          </b> </p>
          <p> <a href="#">954541123</a> </p>
          <p> <a href="#">652222545</a> </p>
          <p class="lead mt-3"> <b>Correo</b> </p>
          <p> <a href="#">cinepipsur@gmail.com</a> </p>
          <p> <a href="#">cinepi@cinepi.com</a> </p>
        </div>
        <div class="col-md-7 p-4">
          <h3 class="mb-3">Formulario de contacto</h3>
          <form action="" method="POST">
            <div class="form-row">
              <div class="form-group col-md-6"> <input type="text" class="form-control" id="nombre" placeholder="Nombre"> </div>
              <div class="form-group col-md-6"> <input type="text" class="form-control" id="apellido" placeholder="Apellido"> </div>
            </div>
            <div class="form-group"> <input type="text" class="form-control" id="motivo" placeholder="Motivo del mensaje"> </div>
            <div class="form-group"> <input type="email" class="form-control" id="correo" placeholder="Correo"> </div>
            <div class="form-row">
              <div class="form-group col-md-6"> <input type="number" class="form-control" id="tlf" placeholder="Teléfono de contacto"> </div>
              <div class="form-group col-md-6"> <input type="text" class="form-control" id="poblacion" placeholder="Población"> </div>
            </div>
            <div class="form-group"> <textarea class="form-control" id="mensaje" rows="4" placeholder="Tu mensaje"></textarea> </div> <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

    </section><br>
  
</body>

<?php include_once("../inc/footer.php"); ?>

</html>
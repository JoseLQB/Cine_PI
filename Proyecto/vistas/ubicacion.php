<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once("../inc/head.php"); ?>

  <title>Ubicación</title>
</head>

<body>
  <?php include_once("../inc/nav.php"); ?>
  <div class="container ub">
    <div class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <address>
              <strong>Cines Pi</strong><br />Calle Ruiz de Alarcón Nº22<br /> Sevilla CP:41007<br /> <abbr>Teléfono:</abbr> 653221287
            </address>
          </div>
          <div class="col-sm-7"> <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3169.994079834789!2d-5.972490284735325!3d37.38997227983134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd126ebafeb76ea1%3A0x85eba24a3ba88e99!2sCalle%20Ruiz%20de%20Alarc%C3%B3n%2C%202%2C%2041007%20Sevilla!5e0!3m2!1ses!2ses!4v1588296880513!5m2!1ses!2ses" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
        </div>
      </div>
    </div>
  </div>
</body>

<?php include_once("../inc/footer.php"); ?>

</html>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once("../inc/head.php") ?>

  <title>Cartelera</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="../js/cartelera.js"></script>
</head>

<body class="cartelera"><br>
  <?php include_once("../inc/nav.php") ?><br><br>
  <div class="py-12">
    <div class="container">
      <div class="row slider">
        <div class="col-md-12 text-warning text-center  d-flex flex-row-reverse">
          <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"> </li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"> </li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"> </li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="carousel-caption">
                  <div class="opa">
                    <h4 class="textCarro">Bienvenidos al cine</h4>
                  </div>
                  <div class="opa"><b>
                      <p class="textCarro">Te damos la bienvenida a nuestra web, donde podrás adquirir tus entradas con total seguridad y disfrutar de una gran selección de la mejores películas de todos los tiempos</p>
                    </b></div>
                </div><img class="d-block w-100 mx-auto imgCarro" src="../assets/images/cine.jpg" width="1000" height="400">
              </div>
              <div class="carousel-item "> <img class="d-block w-100 mx-auto imgCarro" src="../assets/images/anime.jpg" width="1200" height="400">
                <div class="carousel-caption">
                  <div class="opa">
                    <h4 class="textCarro">Nuestra cartelera</h4>
                  </div>
                  <div class="opa"><b>
                      <p class="textCarro">Tenemos a tu disposición una selección de películas que se irán rotando. Muy pronto también tendremos estrenos</p>
                    </b></div>
                </div>
              </div>
              <div class="carousel-item"> <img class="d-block w-100 mx-auto imgCarro" src="../assets/images/clint.jpeg" width="1000" height="400">
                <div class="carousel-caption">
                  <div class="opa">
                    <h4 class="textCarro">Sorteo de verano</h4>
                  </div>
                  <div class="opa"><b>
                      <p class="textCarro">Durante todo el mes de julio, todos los usuarios que compren más de dos entradas entrarán en un sorteo de un viaje al desierto de las Termópilas en Almería, donde se rodaron los grandes clásicos del spagetti western</p>
                    </b></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section id="centro">
    <!--Contenido generado con jquery-->
  </section>
</body>
<?php include_once("../inc/footer.php"); ?>

</html>
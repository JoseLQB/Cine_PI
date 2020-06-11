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

<body class="cartelera">
  <?php include_once("../inc/nav.php") ?><br><br>
  <div class="py-12">
    <div class="container">
      <!-------- Slider publicitario -------->
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
                    <h4 class="textCarro">Próximos estrenos</h4>
                  </div>
                  <div class="opa"><b>
                      <p class="textCarro">Muy pronto podrás disfrutar de nuevas películas en nuestro cine</p>
                    </b></div>
                </div><img class="d-block w-100 mx-auto imgCarro" src="../assets/images/estrenos.jpg" width="1000" height="400">
              </div>
              <div class="carousel-item "> <img class="d-block w-100 mx-auto imgCarro" src="../assets/images/anime.jpg" width="1200" height="400">
                <div class="carousel-caption">
                  <div class="opa">
                    <h4 class="textCarro">Maratón de anime clásico</h4>
                  </div>
                  <div class="opa"><b>
                      <p class="textCarro">El mes de agosto haremos un maratón con las mejores películas clásicas de animación japonesa</p>
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
  </section>
</body>
<?php include_once("../inc/footer.php"); ?>

</html>
<?php session_start();   ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="../js/des.js"></script>
  <title>Document</title>

  <link rel="stylesheet" href="../assets/styles/style.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">
    <div class="container">
      <a class="navbar-brand" href="muestra.php">CINES PI</a>
      <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
        &#9776;
      </button>
      <div class="collapse navbar-collapse" id="exCollapsingNavbar">
        <ul class="nav navbar-nav">
          <li class="nav-item"><a href="muestra.php" class="nav-link">Inicio</a></li>
          <li class="nav-item"><a href="tarifas.php" class="nav-link">Tarifas</a></li>
          <li class="nav-item"><a href="contacto.php" class="nav-link">Contacto</a></li>
          <li class="nav-item"><a href="ubicacion.php" class="nav-link">Ubicación</a></li>
        </ul>
        <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
          <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"><i class="fa fa-cog fa-fw fa-lg"></i></a></li>

          <!--Formulario de login-->

          <li class="dropdown order-1">
            <span>Hola <?php echo " " .$_SESSION["usuario"] ?></span>
          </li>
        </ul>
      </div>
    </div>
  </nav><br><br><br>


  <section class="row justify-content-around" id="centro">
    <div class="container cont1">
      <div class="row movie-list">
        <?php
        require_once("../bdd/CineDB.php");
        require_once("../bdd/Cine.php");
        echo Cartelera::portada();
        ?>
      </div>
    </div>
    </div>
  </section><br>
  
</body>
<footer class="page-footer font-small blue pt-4">
  <div class="container-fluid text-center text-md-left" style="background-color:  rgb(122, 52, 231); color: white;">
    <div class="row">
      <div class="col-md-6 mt-md-0 mt-3">
        <h5 class="text-uppercase">CINES PI</h5>
        <p>Proyecto desarrollado como proyecto integrado de 2º de DAW para el IES Polígono Sur.</p>
      </div>
      <hr class="clearfix w-100 d-md-none pb-3">
      <div class="col-md-3 mb-md-0 mb-3">
        <h5 class="text-uppercase">Links de interés</h5>
        <ul class="list-unstyled">
          <li>
            <a href="https://github.com/JoseLQB" target="_blank">GitHub &nbsp &nbsp <img class="gitLogo" src="../assets/images/github.png" alt=""> </a>
          </li>
          <li>
            <a href="https://github.com/JoseLQB" target="_blank">Twitter &nbsp &nbsp<img class="ttLogo" src="../assets/images/twitter.png" alt=""> </a>
          </li>
          <li>
            <a href="https://github.com/JoseLQB" target="_blank"> Instagram &nbsp<img class="gitLogo" src="../assets/images/insta.png" alt=""> </a>
          </li>
          <li>
            <a href="https://github.com/JoseLQB" target="_blank"> Facebook &nbsp<img class="gitLogo" src="../assets/images/fb.png" alt=""> </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://github.com/JoseLQB">Jose Luis Quintanilla Blanco</a>
  </div>
</footer>

</html>
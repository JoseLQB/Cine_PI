<?php
session_start();
if (!isset($_SESSION["usuario"]) || ($_SESSION["admin"] == 0)) {
  header("location:../../muestra.php");
}
require_once "../model/Funciones.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--Bootstrap-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <!--Link para usar iconos-->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <!--Fuente del título de la web-->
  <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

  <!--Fuente del nav-->
  <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri&family=Righteous&display=swap" rel="stylesheet">

  <!--Enlace al favicon-->
  <link rel="shortcut icon" href="../../../assets/images/favicon.png" type="image/x-icon">

  <!--Estilos propios con CSS-->
  <link rel="stylesheet" href="../../../assets/styles/style.css">
</head>

<body class="admin">
  <script src="../js/efectos.js"></script>


  <style>
    .yellow:hover {
      color: #FCA311;
    }

    .titulo {
      color: #FCA311;
      margin-top: 5px;
    }
  </style>
  <script src="../js/efectos.js"></script>
  <br></b>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top " id="menu" style="background:black; color:black" role="navigation">
    <div class="container">
      <a class="navbar-brand " href="../../muestra.php">
        <h3 class="titulo">CINES PI &nbsp<img src="../../../assets/images/pilogo.png" class="logocabecera" alt=""> </h3>
      </a>
      <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
        &#9776;
      </button>
      <div class="collapse navbar-collapse" id="exCollapsingNavbar">
        <ul class="nav navbar-nav "> <?php
                                      //Enlace exclusivo para el administrador
                                      if (isset($_SESSION["admin"])) {
                                        if ($_SESSION["admin"] == 1) {
                                      ?>
              <li class="nav-item"><a href="../../administracion.php" class="nav-link"><b style="color:#FCA311">Administración</b></a></li>

          <?php

                                        }
                                      }

          ?>
          <li class="nav-item"><a href="../../muestra.php" class="nav-link btn-menu">Volver al index</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Administrar películas</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../../adminsertPeli.php">Nueva película</a>
              <a class="dropdown-item" href="../../adminBorrarPeli.php">Editar película</a>
              <a class="dropdown-item" href="buscar.php" target="_blank">Buscar película</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Administrar proyecciones</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../../admininsertProy.php">Nueva proyección</a>
              <a class="dropdown-item" href="../../adminBorraProy.php">Editar proyección</a>
            </div>
          </li>


        </ul>
        <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
          <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"></a></li>

          <!--Formulario para acceder al login-->
          <?php
          if (!isset($_SESSION["usuario"])) { ?>
            <li class="dropdown order-1">
              <a href="registro.php" class="btn btn-light" role="button">Registrarse</a>&nbsp &nbsp
              <a href="login.php" class="btn btn-warning" href="#" role="button"><i class="fa fa-address-book-o"></i>&nbsp Login</a>
              <ul class="dropdown-menu dropdown-menu-right mt-2">
                <li class="px-3 py-9">
                  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <div class="form-group">
                      <input id="emailInput" placeholder="Email" name="usuario" class="form-control form-control-sm" type="text" required="">
                    </div>
                    <div class="form-group">
                      <input id="passwordInput" placeholder="Password" name="pass" class="form-control form-control-sm" type="text" required="">
                    </div>
                    <div class="form-group">
                      <input type="submit" name="login" class="btn btn-primary btn-block" value="Aceptar">
                    </div>
                  </form>
                </li>
              </ul>
            </li>
          <?php
          } else { ?>
            <li class="dropdown order-1">
              <span class="navbar-brand"><svg class="bi bi-film" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" style="margin-top: -5px;" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0h8v6H4V1zm8 8H4v6h8V9zM1 1h2v2H1V1zm2 3H1v2h2V4zM1 7h2v2H1V7zm2 3H1v2h2v-2zm-2 3h2v2H1v-2zM15 1h-2v2h2V1zm-2 3h2v2h-2V4zm2 3h-2v2h2V7zm-2 3h2v2h-2v-2zm2 3h-2v2h2v-2z" />
                </svg> Hola <a href="perfilUsuario.php" class="goPerfil yellow"><?php echo $_SESSION["usuario"] ?></a> </span>
              <a href="logoff.php" class="yellow">Cerrar Sesion</a>

            </li>
          <?php

          }

          ?>
        </ul>
      </div>
    </div>
  </nav><br><br><br><br><br>




  <section class=" justify-content-around sec-busca" id="centro">
    <div class="container cont-busca"><br><br>
      <div class="card">
        <div class="card-header">
          <h3 class="mb-0 text-center">Busca información sobre cualquier película</h3>
        </div>
        <div class="card-body">
          <form class=form role="form" autocomplete="off" action="#d" method="post">
            <div class="form-group row">
              <label class="col-lg-3 col-form-label form-control-label"></label>
              <div class="col-lg-6 text-center">
                <input type="text" class="form-control" name="pelicula" id="pelicula" placeholder="Escribe el título original de la plícula" required>
              </div>
            </div>
        </div>
        <div class="offset-2"></div>
        <br>
        <br>
        <div class="col-md-2 text-center">
          <input type="submit" class="btn btn-primary btn-block" value="Buscar"><br>
        </div>
        <div class="offset-2"></div>
        </form>
      </div><span id="d"></span><br><br>
      <div class="row movie-list caja1">
        <img class="card-img-top img-busca">

        <?php
        if (isset($_POST['pelicula'])) {
          $funciones = new Funciones();
          $funciones->getPeliculas($_POST['pelicula']);
        }
        ?>
      </div>
    </div>
    <br><br>
  </section><br><br>


  <footer class="page-footer font-small blue pt-4" style="background:black">

    <div class="container-fluid text-center text-md-left footcent" style="background:#14213D">

      <div class="row">
        <div class="col-md-6 mt-md-0 mt-3"><br>
          <h3 class="titulo">CINES PI &nbsp<img src="../assets/images/pilogo.png" class="logocabecera" alt=""> </h3>
          <p>Web desarrollada como proyecto integrado de 2º de DAW para el <a id="linkies" href="https://iespoligonosur.org" target="_blank">IES Polígono Sur</a>.</p>

        </div>
        <hr class="clearfix w-100 d-md-none pb-3">
        <div class="col-md-3 mb-md-0 mb-3">
          <h5 class="text-uppercase">Links de interés</h5>
          <ul class="list-unstyled">
            <li>
              <table>
                <tr>
                  <td><a href="https://github.com/JoseLQB/Cine_PI" target="_blank">GitHub </a></td>
                  <td><img class="gitLogo" src="../../../assets/images/github.png" alt=""></td>
                </tr>
            </li>
            <li>
              <tr>
                <td><a href="https://github.com/JoseLQB" target="_blank"> Instagram </a></td>
                <td><img class="gitLogo" src="../../../assets/images/insta.png" alt=""></td>
              </tr>
            </li>
            <li>
              <tr>
                <td><a href="https://github.com/JoseLQB" target="_blank"> Facebook </a></td>
                <td><img class="gitLogo" src="../../../assets/images/fb.png" alt=""></td>
              </tr>
              </table>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
      <a href="https://github.com/JoseLQB">Jose Luis Quintanilla Blanco</a>
    </div>
  </footer>
</body>

</html>
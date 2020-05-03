<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once("../inc/head.php") ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="../js/proyecciones.js"></script>

  <title>Compra</title>

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
          <?php
          if (!isset($_SESSION["usuario"])) { ?>
            <li class="dropdown order-1">
              <a href="registro.php">Registrarse</a>
              <a href="login.php" class="btn btn-primary" href="#" role="button">Login</a>
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
              <span class="navbar-brand">Hola <?php echo $_SESSION["usuario"] ?> </span>
              <a href="logoff.php">Cerrar Sesion</a>

            </li>
          <?php

          }

          ?>
        </ul>
      </div>
    </div>
  </nav><br><br><br>
  <div class="container-fluid cont-compra">
    <div class="row">
      <div class="col-md-8">
        <dl>
          <dd><br>
            <?php
            $id = $_GET["varID"];
            require_once("../bdd/Cine.php");
            $titulo = Cartelera::getTitulo($id);
            echo "<h3>" . $titulo . " (" . Cartelera::getFecha($id) . ")</h3>";
            ?>
          </dd>
          <dt>
            Pais
          </dt>
          <dd>
            <?php
            echo "<p>" . Cartelera::getPais($id) . "</p>";
            ?>
          </dd>
          <dt>
            Director
          </dt>
          <dd>
            <?php
            echo "<p>" . Cartelera::getDirector($id) . "</p>";
            ?>
          </dd>
          <dt>
            Nota: 10
          </dt>
          <dd>
            <br><br>
          </dd>
          <dt>
            Sinopsis:
          </dt>
          <dd>
            <?php
            echo "<p>" . Cartelera::getSinopsis($id) . "</p>";
            ?>
          </dd>
          <dt>
            Tráiler:
          </dt>
          <dd>
            <?php
            echo "<iframe width='560' height='315' src='" . Cartelera::getTrailer($id) . "' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
            ?>
          </dd>

        </dl>
      </div>
      <div class="col-md-4">
        <br><img alt="Bootstrap Image Preview" src="<?php echo Cartelera::getCartel($id); ?>" />
      </div>

    </div>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Comprar</button>

    <!-- Modal -->
    <?php

    if (isset($_SESSION["usuario"])) {
    ?>

      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Estas son las sesiones disponibles para <?php echo  $titulo ?></h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Volver</button>
            </div>
          </div>

        </div>
      </div>

    <?php
    } else {
    ?>
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Si quieres comprar entradas para <?php echo  $titulo ?> <a href="login.php"> accede con tu cuenta</a> o <a href="registro.php"> regístrate</a>.</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Volver</button>
            </div>
          </div>

        </div>
      </div>
    <?php
    }

    ?><br><br><br>
  </div>
</body>
<?php include_once("../inc/footer.php") ?>

</html>
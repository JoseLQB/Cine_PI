<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/proyecciones.js"></script>
    <link rel="stylesheet" href="../assets/styles/style.css">
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
                    <li class="nav-item"><a href="#" class="nav-link">Contacto</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Ubicación</a></li>
                </ul>
                <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                    <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"><i class="fa fa-cog fa-fw fa-lg"></i></a></li>
                    <li class="dropdown order-1">
                        <a href="registro.php">Registrarse</a>
                        <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle">Acceder <span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-menu-right mt-2">
                            <li class="px-3 py-9">
                                <form class="form" role="form">
                                    <div class="form-group">
                                        <input id="emailInput" placeholder="Email" class="form-control form-control-sm" type="text" required="">
                                    </div>
                                    <div class="form-group">
                                        <input id="passwordInput" placeholder="Password" class="form-control form-control-sm" type="text" required="">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Aceptar</button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
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
                        $titulo =Cartelera::getTitulo($id);
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
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Estas son las sesiones disponibles para <?php echo $titulo ?></h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                        <p>12-12-2021   15:30</p>
                        <p>Cantidad <input type="number" name="" id="" ></p>
                        <p>
                            Sala 1
                        </p>
                        <p> <input type="submit" value="Añadir"></p>
                        </form>
                        
                        
                        
                        <form action="" method="POST">
                        <p>12-12-2021   17:30</p>
                        <p>Cantidad <input type="number" name="" id="" ></p>
                        <p>Sala 2</p>

                        <p> <input type="submit" value="Añadir"></p></form>
                        <form action="" method="post">
                        <p>12-12-2021   20:30</p>
                        <p>Cantidad <input type="number" name="" id="" ></p>
                        <p>Sala 2</p>
                        <p> <input type="submit" value="Añadir"></p>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Volver</button>
                    </div>
                </div>

            </div>
        </div><br><br><br>
    </div>
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
    <a href="https://mdbootstrap.com/">Jose Luis Quintanilla Blanco</a>
  </div>
</footer>
</html>
<?php
session_start();
if (!isset($_SESSION["usuario"]) || ($_SESSION["admin"] == 0)) {
    header("location:muestra.php");
}
require_once "../model/Funciones.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="../../../assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles/styles.css">
</head>

<body class="admin">

    <script src="../js/efectos.js"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top " id="menu" role="navigation">
        <div class="container">
            <a class="navbar-brand" href="../../muestra.php">CINES PI</a>
            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                &#9776;
            </button>
            <div class="collapse navbar-collapse" id="exCollapsingNavbar">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a href="../../muestra.php" class="nav-link">Inicio</a></li>
                    <li class="nav-item"><a href="../../tarifas.php" class="nav-link">Tarifas</a></li>
                    <li class="nav-item"><a href="../../contacto.php" class="nav-link">Contacto</a></li>
                    <li class="nav-item"><a href="../../ubicacion.php" class="nav-link">Ubicación</a></li>
                    <?php

                    if (isset($_SESSION["admin"])) {
                        if ($_SESSION["admin"] == 1) {
                    ?>
                            <li class="nav-item"><a href="administracion.php" class="nav-link">Panel de administración</a></li>

                    <?php

                        }
                    }

                    ?>
                </ul>
                <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                    <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"><i class="fa fa-cog fa-fw fa-lg"></i></a></li>

                    <!--Formulario de login-->
                    <?php
                    if (!isset($_SESSION["usuario"])) { ?>
                        <li class="dropdown order-1">
                            <a href="registro.php">Registrarse</a>&nbsp &nbsp
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




    <section class="row justify-content-around sec-busca" id="centro">
        <div class="container cont-busca">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0 text-center">Busca información sobre cualquier película</h3>
                </div>
                <div class="card-body">
                    <form class=form role="form" autocomplete="off" action="#" method="post">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Película</label>
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
            </div><br>
            <div class="row movie-list caja1">
                <img class="card-img-top">

                <?php
                if (isset($_POST['pelicula'])) {
                    $funciones = new Funciones();
                    $funciones->getPeliculas($_POST['pelicula']);
                }
                ?>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
            </div>
        </div>
    </section>

    <footer class="page-footer font-small blue pt-4">

        <div class="container-fluid text-center text-md-left footcent">

            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3">
                    <h5 class="text-uppercase">CINES PI</h5>
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
                                    <td><img class="gitLogo" src="../assets/images/github.png" alt=""></td>
                                </tr>
                        </li>
                        <li>
                            <tr>
                                <td><a href="https://twitter.com/QBHeller" target="_blank">Twitter</a></td>
                                <td><img class="ttLogo" src="../assets/images/twitter.png" alt=""></td>
                            </tr>
                        </li>
                        <li>
                            <tr>
                                <td><a href="https://github.com/JoseLQB" target="_blank"> Instagram </a></td>
                                <td><img class="gitLogo" src="../assets/images/insta.png" alt=""></td>
                            </tr>
                        </li>
                        <li>
                            <tr>
                                <td><a href="https://github.com/JoseLQB" target="_blank"> Facebook </a></td>
                                <td><img class="gitLogo" src="../assets/images/fb.png" alt=""></td>
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
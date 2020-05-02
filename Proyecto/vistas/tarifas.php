<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/tarifas.js"></script>
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
    <section>
        <div class="container">
        </div>
    </section><br><br>


</body>
<footer class="page-footer font-small blue pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left" style="background-color:  rgb(122, 52, 231); color: white;">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">

                <!-- Content -->
                <h5 class="text-uppercase">CINES PI</h5>
                <p>Proyecto desarrollado como proyecto integrado de 2º de DAW para el IES Polígono Sur.</p>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none pb-3">

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">

                <!-- Links -->
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
            <!-- Grid column -->

            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="https://mdbootstrap.com/">Jose Luis Quintanilla Blanco</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->

</html>
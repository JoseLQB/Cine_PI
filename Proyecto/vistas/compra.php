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
                        <p>Añadir <input type="submit" value="Añadir"></p>
                        <p>12-12-2021   17:30</p>
                        <p>Cantidad <input type="number" name="" id="" ></p>
                        <p>Añadir <input type="submit" value="Añadir"></p>
                        <p>12-12-2021   20:30</p>
                        <p>Cantidad <input type="number" name="" id="" ></p>
                        <p>Añadir <input type="submit" value="Añadir"></p>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
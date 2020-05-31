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
<?php include_once("../inc/nav.php") ?>
  <div class="container-fluid cont-compra">
    <div class="row">
      <div class="col-sm-6 col-md-8">
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
            Género
          </dt>
          <dd>
            <?php
            echo "<p>" . Cartelera::getGenero($id) . "</p>";
            ?>
          </dd><dt>
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
                <?php 
        echo "Nota: " . Cartelera::getMedia($id)[0];
        ?>
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
      <div class="col-sm-6 col-md-4">
        <br><img class="img" alt="Bootstrap Image Preview" src="<?php echo Cartelera::getCartel($id); ?>" />
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
  </div><div class="container">
      <div class="row mb-3" ></div>
      <div class="row">
        <div class="p-4 col-lg-8">
          <h4 class="mb-3"> <?php
            $id = $_GET["varID"];
            require_once("../bdd/Cine.php");
            $titulo = Cartelera::getTitulo($id);
            echo "<h3>" . $titulo . " (" . Cartelera::getFecha($id) . ")</h3>";
            ?></h4>
          <ul class="">
            <li class="my-1">Género 
            <?php
            echo  Cartelera::getGenero($id) ;
            ?></li>
            <li class="my-1">Pais: 
            <?php
            echo Cartelera::getPais($id) ;
            ?></li>
            <li class="my-1"> Director: <?php
            echo  Cartelera::getDirector($id) ;
            ?></li>
            <li class="my-1">Sinopsis: 
            <?php
            echo Cartelera::getSinopsis($id);
            ?></li>
          </ul>
          <div class="embed-responsive embed-responsive-16by9">
           
          <?php
            echo "<iframe width='560' height='315' src='" . Cartelera::getTrailer($id) . "' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
            ?>
          </div>
        </div>
        <div class="col-md-4"><br><br><img class="img-fluid d-block" alt="Cartel" src="<?php echo Cartelera::getCartel($id); ?>" /></div>
      </div>
    </div>
  </div>
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
</body>
<?php include_once("../inc/footer.php") ?>

</html>
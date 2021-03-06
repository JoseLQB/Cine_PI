<?php
session_start();
if (!isset($_SESSION["usuario"]) || ($_SESSION["admin"] == 0)) {
  header("location:muestra.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once("../inc/head.php") ?>

  <title>Administración</title>
</head>
<body class="admin">
<?php include_once("../inc/navAdmin.php") ?>

  <section class=" " id="centro">
    <div class="container" style="background-color:white">
      <div class="row">
        <div class="col-sm-12">
          <br><a href="buscador/buscar.php" target="_blank" class=" text-center">
            <h3> Buscador de ayuda  <i class="fa fa-search"></i></h3>
          </a>
          <br>
          <h1 class=" text-center">ADMINISTRACIÓN DE CARTELERA</h1>
        </div><br>
      </div><br>
      <div class="col-sm-12">
        <h3 class="text-center">¿Qué quieres hacer?</h3>
      </div><br>
      <div class="row">
        <div class="col-sm-4 text-center">
          <a href="adminsertPeli.php"><button type="button" class="btn btn-primary btn-lg"><i class="fa fa-file-movie-o"></i>&nbsp;Insertar Película</button></a>
        </div>
        <div class="col-sm-4 text-center">
          <a href="adminBorrarPeli.php"><button type="button" class="btn btn-primary btn-lg"><i class="fa fa-wrench"></i>&nbsp;Borrar | Actualizar</button></a>
        </div>
        <div class="col-sm-4 text-center">
          <a href="adminListado.php"><button type="button" class="btn btn-primary btn-lg"><i class="fa fa-list-ul"></i>&nbsp;Ver Listado </button></a>
        </div>
      </div><br><br>
      <hr><br>
    </div>
    <div class="container" style="background-color:white">
      <div class="row ">
        <div class="col-sm-12">
          <h1 class=" text-center">ADMINISTRACIÓN DE PROYECCIONES</h1>
        </div><br>
      </div><br>
      <div class="col-sm-12">
        <h3 class="text-center">¿Qué quieres hacer?</h3>
      </div><br>
      <div class="row">
        <div class="col-sm-4 text-center">
          <a href="admininsertProy.php"><button type="button" class="btn btn-primary btn-lg"><i class="fa fa-file-movie-o"></i>&nbsp;Insertar Proyeccón</button></a>
        </div>
        <div class="col-sm-4 text-center">
          <a href="adminBorraProy.php"><button type="button" class="btn btn-primary btn-lg"><i class="fa fa-wrench"></i>&nbsp;Borrar | Actualizar</button></a>
        </div>
        <div class="col-sm-4 text-center">
          <a href="adminListadoProy.php"><button type="button" class="btn btn-primary btn-lg"><i class="fa fa-list-ul"></i>&nbsp;Ver Todas</button></a>
        </div>
      </div><br><br>
      <hr><br>

  </section><br>

</body>

<?php include_once("../inc/footer.php"); ?>

</html>
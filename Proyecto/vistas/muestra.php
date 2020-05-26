<?php
  session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once("../inc/head.php") ?>

  <title>Cartelera</title>
</head>
<style>
  #slider {
    margin-left: 200px;
    margin-right: 200px;
    height: 500px;
  }
</style>

<body class="cartelera">
  <!--Slide-->


  
  <?php include_once("../inc/nav.php") ?>

  <section class="justify-content-around" id="centro">
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

<?php include_once("../inc/footer.php"); ?>

</html>
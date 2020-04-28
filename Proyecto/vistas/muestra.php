<!DOCTYPE html>
<html lang="en">

<?php include_once("../inc/head.php");?>
<body>
    <h1>CINE</h1>
    <?php 
    require_once("../bdd/Cine.php");
    $consulta = Cartelera::consulta();


    while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
        echo $reg["titulo"]."<br>";
        echo '<img src="'.$reg["cartel"].'" alt="">';
        echo '<iframe width="560" height="315" src="'.$reg["trailer"].'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'."<br>";
        echo '<input type="button" value="COMPRAR"><br>';
    }
    var_dump($consulta);
    ?>
</body>
</html>
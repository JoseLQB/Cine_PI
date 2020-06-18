<?php
session_start();
if (!isset($_SESSION["usuario"]) || ($_SESSION["admin"] == 0)) {
    header("location:muestra.php");
}
require_once("../bdd/Tarifas.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../inc/head.php"); ?>

    <title>Registro</title>
</head>

<body class="admin">
    <?php 
    $men = "";
    $fetch = 0;
    if(isset($_POST["editTar"])){
        Tarifas::update($_POST["codTar"], $_POST["precio"]);
        $fetch=1;
    }
    if($fetch == 1){
        $men = '<div id="msg_error" class="alert alert-success" role="alert" ><center>Precio actualizado</center></div>';
    }


    ?>
    <?php include_once("../inc/navAdmin.php") ?>
    <div class="container">
        <div class="row d-flex justify-content-around mt-5">
            <div class="card col-md-6 col-md-offset-6">
                <article class="card-body">
                    <?php echo $men ?>
                    <h4>Edita el precio de las tarifas</h4><br>
                    <?php
                    $lista  = Tarifas::getTarifas();
                    ?> <ul><?php
                            foreach ($lista as $k) {
                            ?>
                            <form action="adminTarifas.php" method="post">
                                <div class="form-group ">
                                    <label class="control-label " for="number">
                                        <?php echo $k->nombre ?>
                                    </label>
                                    <input type="hidden" name="codTar" value="<?php echo $k->id ?>">
                                    <input class="form-control" id="precio" name="precio" type="text" pattern="^[0-9]+([.][0-9]+)?$" required placeholder="<?php echo $k->precio ?>" title="Solo se admiten números"/>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <button class="btn btn-primary " name="editTar" type="submit">
                                        <i class="fa fa-euro"></i>ditar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        <?php

                            }

                        ?>
                        <hr>
                    </ul>
                    <a href="administracion.php">Volver</a>
                    <!--  <a href='compra.php?varID=".$reg["idPelicula"].-->
                </article>
            </div>
        </div>
    </div><br><br>
</body>

<?php include_once("../inc/footer.php"); ?>

</html>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../inc/head.php") ?>

    <title>Contacto</title>

</head>
<style>
</style>

<body class="cartelera">
    <!--Slide-->



    <?php include_once("../inc/nav.php") ?>

    <section class="justify-content-around" id="centro">


        <div class="container">
            <div class="row d-flex justify-content-around mt-5">
                <div class="card col-md-6 col-md-offset-6">
                    <article class="card-body">
                        <h4 class="card-title mb-4 mt-1 text-center">Formulario de contacto</h4>

                        <form action="contacto.php" method="post" class="form_contact">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="nombre" placeholder="" value="" require>
                            </div>
                            <div class="form-group">
                                <label>Correo</label>
                                <input type="text" name="correo" class="form-control" placeholder="" value="" require>
                            </div>
                            <div class="form-group">
                                <label>Motivo del mensaje</label>
                                <input type="text" name="motivo" class="form-control" placeholder="" value="" require>
                            </div>
                            <div class="form-group">
                                <label>Tu mensaje</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="mensaje"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="enviar" class="btn btn-primary btn-block">Enviar</buttom>
                            </div>
                            <a href="administracion.php">Volver</a>
                        </form>
                        <div id="msg_error" class="alert alert-danger" role="alert" style="display: none"></div>
                        <div id="msg_ok" class="alert alert-danger" role="alert" style="display: none"></div>
                    </article>
                </div>
            </div><br>

        </div>

    </section><br>
  
</body>

<?php include_once("../inc/footer.php"); ?>

</html>
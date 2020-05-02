<?php 
require_once("../bdd/CineDB.php");
$conexion = CineDB::conectar(); ?>
<!DOCTYPE html>
<html lang="en">

<?php include_once("../inc/head.php");?>
<body>
<div class="container">
        <div class="row d-flex justify-content-around mt-5">
            <div class="card col-md-6 col-md-offset-6">
                <article class="card-body">
                    <h4 class="card-title mb-4 mt-1 text-center">Registro</h4>
                    <form action="POST" class="form_registro">
                        <div class="form-group">
                            <label>Nombre de usuario</label>
                            <input type="text" class="form-control" placeholder="Nombre" require>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" require>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Contraseña">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Registrarse</buttom>
                        </div>
                            <a href="muestra.php">Volver</a>
                    </form>
                    <div id="msg_error" class="alert alert-danger" role="alert" style="display: none"></div>
                    <div id="msg_ok" class="alert alert-danger" role="alert" style="display: none"></div>
                </article>
            </div>
        </div>
    </div>
</body>
</html>

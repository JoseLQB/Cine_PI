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
                    <h1>Bienvenido al cine</h1>
                    <p>
                        <a href="login.php" class="link-item">Login</a>
                        <a href="registro.php" class="link-item">Registro</a>
                    </p>
                </article>
            </div>
        </div>
    </div>
</body>
</html>

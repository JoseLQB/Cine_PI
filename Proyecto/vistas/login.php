<?php

session_start();
require_once("../bdd/CineDB.php");
$conexion = CineDB::conectar(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../inc/head.php"); ?></head>

<title>Login</title>

<?php include_once("../inc/nav.php") ?>
<body class="cartelera">
    <div class="container">
        <div class="row d-flex justify-content-around mt-5">
            <div class="card col-md-6 col-md-offset-6">
                <article class="card-body">
                    <h4 class="card-title mb-4 mt-1 text-center">Accede con tu cuenta</h4>
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="form_registro" method="post">
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" class="form-control" name="usuario" placeholder="Usuario" require>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="pass" placeholder="Contraseña">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="login" class="btn btn-primary btn-block" name="botonlg">Login</buttom>
                        </div>
                        <a href="muestra.php">Volver</a>
                    </form>
                    <div id="msg_error" class="alert alert-danger" role="alert" style="display: none"></div>
                    <div id="msg_ok" class="alert alert-danger" role="alert" style="display: none"></div>

                    <?php

                    if (isset($_POST["login"])) {
                        //include("conexion.php");
                        require_once("../bdd/CineDB.php");
                        $conn = CineDB::conectar();
                        try {

                            $sql = "SELECT * FROM usuarios WHERE nombre = :usuarios AND pass= :pass";
                            $resultado = $conn->prepare($sql);
                            $login = $_POST["usuario"];
                            $pass = $_POST["pass"];
                            $pass = $pass;
                            $resultado->bindValue(":usuarios", $login);
                            $resultado->bindValue(":pass", $pass);
                            $resultado->execute();
                            $results = $resultado->fetchAll(PDO::FETCH_OBJ);
                            $nr = $resultado->rowCount();
                            if ($nr != 0) {
                                foreach ($results as $result) {

                                    $_SESSION["id"] = $result->idUsuario;
                                    $_SESSION["usuario"] = $result->nombre;
                                    $_SESSION["mail"] = $result->mail;
                                    $_SESSION["admin"] = $result->admin;
                                }
                                header("Location:muestra.php");
                            } else {
                    ?> <br>
                                <p class="warning">Error, usuario o contraseña incorrectos</p>
                    <?php
                            }
                        } catch (Exception $e) {
                            die("Error" . $e->getMessage());
                            echo "Linea del error" . $e->getLine();
                        }
                    }
                    ?>

                </article>
            </div>
        </div>
    </div><br><br><br>
</body>
<?php include_once("../inc/footer.php"); ?>
</html>
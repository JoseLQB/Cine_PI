<?php
session_start();
require("../bdd/CineDB.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/styles/style.css">
</head>

<title>Login</title>


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
                        $conn = CineDB::conectar();
                        try {
                            $conexion = CineDB::conectar(); 

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

</html>
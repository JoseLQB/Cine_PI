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
                    <h4 class="card-title mb-4 mt-1 text-center">Accede con tu cuenta </h4>
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="form_registro" method="post">
                        <div class="form-group">
                            <label><svg class="bi bi-person-fill" style="padding-bottom: 2px;" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg>&nbsp;Usuario </label>
                            <input type="text" class="form-control" name="usuario" placeholder="Usuario" require>
                        </div>
                        <div class="form-group">
                            <label><svg class="bi bi-lock-fill" style="padding-bottom: 2px;" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="11" height="9" x="2.5" y="7" rx="2" />
                                    <path fill-rule="evenodd" d="M4.5 4a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z" />
                                </svg>&nbsp;Password</label>
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
                            $pass = md5($_POST["pass"]);
                            echo $pass;
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
                                <div id="msg_error" class="alert alert-danger" role="alert">
                                    <center>Ususario y/o contraseña incorrecto/s</center>
                                </div>

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
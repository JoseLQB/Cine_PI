<?php

session_start();
require_once("../bdd/CineDB.php");
$conexion = CineDB::conectar(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../inc/head.php"); ?>

    <title>Registro</title>
</head>
<?php include_once("../inc/nav.php") ?>
<body class="cartelera">
    <div class="container">
        <div class="row d-flex justify-content-around mt-5">
            <div class="card col-md-6 col-md-offset-6">
                <article class="card-body">
                    <h4 class="card-title mb-4 mt-1 text-center">Registro</h4>
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" class="form_registro">
                        <div class="form-group">
                            <label>Nombre de usuario</label>
                            <input type="text" class="form-control" name="usuario" placeholder="Nombre" require>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="mail" class="form-control" placeholder="Email" require>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="pass" class="form-control" placeholder="Contraseña">
                        </div>
                        <div class="form-group">
                            <label>Repite la contraseña</label>
                            <input type="password" name="passc" class="form-control" placeholder="Contraseña">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="regis" class="btn btn-primary btn-block">Registrarse</buttom>
                        </div>
                        <a href="muestra.php">Volver</a>
                    </form>
                    <div id="msg_error" class="alert alert-danger" role="alert" style="display: none"></div>
                    <div id="msg_ok" class="alert alert-danger" role="alert" style="display: none"></div>
                </article>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST["regis"]) && $_POST["usuario"] != "" && $_POST["pass"] != "" && $_POST["passc"] != "") {
        $usuario = $_POST["usuario"];
        $pass = $_POST["pass"];
        $mail = $_POST["mail"];
        $passc = $_POST["passc"];
        require_once("../bdd/CineDB.php");
        $conn = CineDB::conectar();
        if ($pass == $passc) {
            try {
                $sql = "INSERT INTO usuarios (idUsuario, nombre, mail, pass) VALUES (NULL, :nombre, :mail, :pass)";
                $sql2 = "SELECT nombre FROM usuarios";
                $result2 = $conn->query($sql2);
                $regs = $result2->fetchAll(PDO::FETCH_OBJ);
                $ok = true;
                foreach ($regs as $k) {
                    if ($k->nombre == $usuario) {
                        $ok = false;
                    }
                }
                if ($ok == true) {
                    $result = $conn->prepare($sql);
                    $rows = $result->execute(array(":nombre" => $usuario, ":pass" => $pass, ":mail" => $mail));
                    if ($rows > 0) {
                        echo '<center><h3><font color="green">¡Usuario Registrado!</font></h3></center><br>';
                    }
                } else {
                    echo '<center><h3><font color="green">¡Usuario Registrado!</font></h3></center><br>';
                }
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    } else {
        echo "<font color='red'>Introduce todos los datos</font>";
    }

    ?><br><br>
</body>
<?php include_once("../inc/footer.php"); ?>

</html>
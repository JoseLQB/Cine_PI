<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location:muestra.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../inc/head.php") ?>

    <title>Cartelera</title>
</head>

<body class="cartelera">
    <!--Slide-->



    <?php include_once("../inc/nav.php") ?>

    <section class="row " id="centro">
        <div class="container" style="background-color:yellow">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class=" text-center">PANEL DE ADMINISTRACIÓN</h1>
                </div><br>
            </div><br>
            <div class="col-sm-12">
                <h3 class="text-center">¿Qué quieres hacer?</h3>
            </div><br>
            <div class="row">
                <div class="col-sm-3 text-center">
                    <a href="insertPeli.php"><button type="button" class="btn btn-primary btn-lg">Insertar Película</button></a>
                </div>
                <div class="col-sm-3 text-center">
                    <button type="button" class="btn btn-primary btn-lg">Borrar Película</button>
                </div>
                <div class="col-sm-3 text-center">
                    <a href="insertPeli.php"><button type="button" class="btn btn-primary btn-lg">Editar Película</button></a>
                </div>
                <div class="col-sm-3 text-center">
                    <button type="button" class="btn btn-primary btn-lg">Ver Listado</button>
                </div>
            </div><br>
        </div>
    </section><br>

</body>

<?php include_once("../inc/footer.php"); ?>

</html>



//////////////

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
</head>

<body>
    <img src="../assets/images/construc.png" alt=""><br>
    &nbsp &nbsp Redirigiendo...
    <?php 
    require_once("../bdd/Cine.php");
    Cartelera::nuevaPelicula("", "Japon", "Anime", 95, 2015, "Los protagonistas, Taki y Mitsuha, son dos completos desconocidos, a pesar de eso, están destinados a conocerse. Durante el sueño, ambos adolescentes intercambian sus cuerpos, con resultados impredecibles en la vida de ambos.11​Mitsuha es una joven de pueblo que anhela la emoción de la vida de la ciudad. Un día, sueña con un chico tal y como desea, al mismo tiempo el chico en cuestión, Taki, de la gran ciudad, sueña a su vez con Mitsuha, una encantadora chica del campo. Taki y Mitsuha descubren un día que durante el sueño sus cuerpos se intercambian, y comienzan a comunicarse por medio de notas. A medida que consiguen superar un reto tras otro, se va creando entre los dos un vínculo muy especial.", "Your name", "Makoto Shinkai", "https://www.youtube.com/embed/yPPaLgSXYlM", "https://www.lahiguera.net/cinemania/pelicula/7933/your_name_-cartel-7374.jpg");

    ?>

    <script type="text/javascript">
        setTimeout("window.location='muestra.php'", 3000);
    </script>

</body>
<!--
SELECT COUNT(idUsuario) FROM `reserva` WHERE idProyeccion = 111
El resultado de esta consulta se restará al número de aforo de cada sala para obtener el total




-->
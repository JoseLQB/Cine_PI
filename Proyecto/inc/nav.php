<script src="../js/efectos.js"></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top " id="menu" role="navigation">
  <div class="container">
    <a class="navbar-brand" href="muestra.php">CINES PI</a>
    <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
      &#9776;
    </button>
    <div class="collapse navbar-collapse" id="exCollapsingNavbar">
      <ul class="nav navbar-nav">
        <li class="nav-item"><a href="muestra.php" class="nav-link">Inicio</a></li>
        <li class="nav-item"><a href="tarifas.php" class="nav-link">Tarifas</a></li>
        <li class="nav-item"><a href="contacto.php" class="nav-link">Contacto</a></li>
        <li class="nav-item"><a href="ubicacion.php" class="nav-link">Ubicación</a></li>
        <?php

        if (isset($_SESSION["admin"])) {
          if ($_SESSION["admin"] == 1) {
        ?>
            <li class="nav-item"><a href="administracion.php" class="nav-link">Panel de administración</a></li>

        <?php

          }
        }

        ?>
      </ul>
      <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
        <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"><i class="fa fa-cog fa-fw fa-lg"></i></a></li>

        <!--Formulario de login-->
        <?php
        if (!isset($_SESSION["usuario"])) { ?>
          <li class="dropdown order-1">
            <a href="registro.php">Registrarse</a>&nbsp &nbsp
            <a href="login.php" class="btn btn-primary" href="#" role="button">Login</a>
            <ul class="dropdown-menu dropdown-menu-right mt-2">
              <li class="px-3 py-9">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                  <div class="form-group">
                    <input id="emailInput" placeholder="Email" name="usuario" class="form-control form-control-sm" type="text" required="">
                  </div>
                  <div class="form-group">
                    <input id="passwordInput" placeholder="Password" name="pass" class="form-control form-control-sm" type="text" required="">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="login" class="btn btn-primary btn-block" value="Aceptar">
                  </div>
                </form>
              </li>
            </ul>
          </li>
        <?php
        } else { ?>
        <style>

        </style>
          <li class="dropdown order-1">
            <span class="navbar-brand"> Hola <a href="perfilUsuario.php" class="goPerfil"><?php echo $_SESSION["usuario"] ?></a> </span>
            <a href="logoff.php">Cerrar Sesion</a>

          </li>
        <?php

        }

        ?>
      </ul>
    </div>
  </div>
</nav><br><br><br>
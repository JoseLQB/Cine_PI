<script src="../js/efectos.js"></script>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top " id="menu" style="background:black" role="navigation">
  <div class="container">
    <a class="navbar-brand " href="muestra.php"><h3 class="titulo">CINES PI &nbsp<img src="../assets/images/pilogo.png" class="logocabecera" alt=""> </h3> </a>
    <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
      &#9776;
    </button>
    <style>
      .yellow:hover{
        color: #FCA311;
      }
      .titulo{
        color: #FCA311;
        margin-top: 5px;
      }
    </style>
    <div class="collapse navbar-collapse" id="exCollapsingNavbar">
      <ul class="nav navbar-nav">
        <li class=""><a href="muestra.php" class="nav-link">Inicio</a></li>
        <li class="nav-item"><a href="tarifas.php" class="nav-link ">Tarifas</a></li>
        <li class="nav-item"><a href="contacto.php" class="nav-link">Contacto</a></li>
        <li class="nav-item"><a href="ubicacion.php" class="nav-link">Ubicación</a></li>
        <?php
      //Enlace exclusivo para el administrador
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
        <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"></a></li>

        <!--Formulario para acceder al login-->
        <?php
        if (!isset($_SESSION["usuario"])) { ?>
          <li class="dropdown order-1">
            <a href="registro.php" class="btn btn-light" role="button">Registrarse</a>&nbsp &nbsp
            <a href="login.php" class="btn btn-warning" href="#" role="button"><i class="fa fa-address-book-o"></i>&nbsp Login</a>
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
          <li class="dropdown order-1">
            <span class="navbar-brand"><svg class="bi bi-film" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" style="margin-top: -5px;" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0h8v6H4V1zm8 8H4v6h8V9zM1 1h2v2H1V1zm2 3H1v2h2V4zM1 7h2v2H1V7zm2 3H1v2h2v-2zm-2 3h2v2H1v-2zM15 1h-2v2h2V1zm-2 3h2v2h-2V4zm2 3h-2v2h2V7zm-2 3h2v2h-2v-2zm2 3h-2v2h2v-2z"/>
</svg> Hola <a href="perfilUsuario.php" class="goPerfil yellow"><?php echo $_SESSION["usuario"] ?></a> </span>
            <a href="logoff.php" class="yellow">Cerrar Sesion</a>

          </li>
        <?php

        }

        ?>
      </ul>
    </div>
  </div>
</nav><br>
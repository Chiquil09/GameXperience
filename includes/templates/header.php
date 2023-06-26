<?php
define("App", "/GameXperience");

if (!isset($_SESSION)) { //REVISA
  session_start(); //CON ESTE IF SI LA SESION NO ESTA INICIADA SE INICIA (PARA QUE NO SEA DOBLE)
}
$auth = $_SESSION["rol"] ?? false;

?>
<!DOCTYPE html>
<html data-bs-theme="dark" data-lt-installed="true" lang="en">

<head><script src="../assets/js/color-modes.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GameXperience</title>
  <link rel="stylesheet" href="<?php echo App; ?>/css/style.css">
  <link rel="stylesheet" href="<?php echo App; ?>/styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
<<<<<<< Updated upstream
  <button class="btn btn-primary fixed-top" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
    <i class="bi bi-list"></i>
  </button>
=======
  <div class="menu">
    <button class="btn btn-primary fixed-top1" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
      <i class="bi bi-list"></i>
    </button>
  </div>
>>>>>>> Stashed changes

  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <a class="navbar-brand" href="<?php echo App; ?>/">
        <img src="imagenes/lo.png" alt="Logo" width="50" class="d-inline-block align-text-top">
        GameXperience
      </a>
    </div>
    <div class="offcanvas-body">

      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item mt-3">
          <a href="<?php echo App; ?>/index.php" class="nav-link" aria-current="page">
            <i class="bi bi-house"></i>
            Inicio
          </a>
        </li>
        <li class="mt-3">
          <a href="<?php echo App; ?>/buscar.php" class="nav-link">
            <i class="bi bi-search"></i>
            Buscar
          </a>
        </li>
        <li class="mt-3">
          <a href="<?php echo App; ?>/acercade.php" class="nav-link">
            <i class="bi bi-braces"></i>
            Acerca de
          </a>
        </li>
        <li class="mt-3">
          <?php if (!$auth) : ?>
            <a href="<?php echo App; ?>/iniciarsesion.php" class="nav-link"><i class="bi bi-braces"></i>Login</a><?php endif; ?>
          <?php
          if ($auth) : ?>
            <a href="<?php echo App; ?>/cerrar-sesion.php" class="nav-link"><i class="bi bi-braces"></i>Cerrar Sesion</a>
          <?php endif; ?>
        </li>
      </ul>

    </div>
  </div>
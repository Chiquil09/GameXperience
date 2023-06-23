<?php
define("App","/GameXperience");

?>
<!DOCTYPE html>
<html data-bs-theme="dark" data-lt-installed="true" lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GameXperience</title>
  <link rel="stylesheet" href="<?php echo App; ?>/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <div class="d-f">
    <div class="sidebar d-flex flex-column flex-shrink-0 p-3">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi pe-none me-2" width="40" height="32">
          <use xlink:href="" />
        </svg>
        <span class="fs-4">GameXperience</span>
      </a>
      <br>
      <br>

      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="<?php echo App; ?>/index.php" class="nav-links active" aria-current="page">
            <i class="bi bi-house"></i>
            Inicio
          </a>
        </li>
        <li class="bajar">
          <a href="<?php echo App; ?>/buscar.php" class="nav-links">
            <i class="bi bi-search"></i>
            Buscar
          </a>
        </li>

        <hr class="custom-hr ">

        <li class="bajar">
          <a href="<?php echo App; ?>/acercade.php" class="nav-links">
            <i class="bi bi-braces"></i>
            Acerca de
          </a>
        </li>

        <li class="bajar">
          <a href="<?php echo App; ?>/iniciarsesion.php" class="nav-links">
            <i class="bi bi-braces"></i>
            Login
          </a>
        </li>
      </ul>
      <div class="dropdown">
      </div>
    </div>
<!DOCTYPE html>
<html data-bs-theme="dark" data-lt-installed="true" lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="bg-dark">
  <div class="d-f">
    <div class="sidebar d-flex flex-column flex-shrink-0 p-3">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi pe-none me-2" width="40" height="32">
          <use xlink:href="" />
        </svg>
        <span class="fs-4">GameXperience</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="/" class="nav-link" aria-current="page">
            <i class="bi bi-house"></i>
            Inicio
          </a>
        </li>
        <li>
          <a href="" class="nav-link text-white">
            <i class="bi bi-search"></i>
            Buscar
          </a>
        </li>
        <li>
          <a href="biblioteca.php" class="nav-link text-white">
            <i class="bi bi-bookmark-fill"></i>
            Biblioteca
          </a>
        </li>
        <li>
          <a href="#" class="nav-link text-white">
            <i class="bi bi-braces"></i>
            Acerca de
          </a>
        </li>
      </ul>
      <hr>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="imagenes/lo.png" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong>User</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
          <li><a class="dropdown-item" href="#">Sign in</a></li>
        </ul>
      </div>
    </div>
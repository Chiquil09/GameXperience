<?php

if (!isset($_SESSION)) { //REVISA
    session_start(); //CON ESTE IF SI LA SESION NO ESTA INICIADA SE INICIA (PARA QUE NO SEA DOBLE)
}
$auth = $_SESSION["login"] ?? false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GameXperience</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>

    <header class="header <?php echo $inicio ? "inicio" : ""; ?> ">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Logotipo de bienes raices" style="width: 30rem;">
                </a>
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Icono menu responsive">
                </div>

                <div class="derecha">
                    <img src="/build/img/dark-mode.svg" alt="Boton dark mode" class="dark-mode-boton">
                    <nav class="navegacion">
                        <a href="/nosotros.php">Nosotros</a>
                        <a href="/anuncios.php">Anuncio</a>
                        <a href="/blog.php">Blog</a>
                        <a href="/contacto.php">Contacto</a>
                        <?php if (!$auth) : ?>
                            <a href="/login.php">Iniciar Sesion</a>
                        <?php endif; ?>
                        <?php if ($auth) : ?>
                            <a href="/cerrar-sesion.php">Cerrar Sesion</a>
                        <?php endif; ?>
                    </nav>
                </div>


            </div> <!--.barra-->

            <?php echo $inicio ? "<h1>Venta de Casas y Departanentos Exclusivos de Lujo </h1>" : ""; ?>

        </div>
    </header>
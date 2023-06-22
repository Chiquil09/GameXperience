<?php

require '../includes/funciones/db_conexion.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $poster = $_FILES['poster'];
    $precio = $_POST['precio'];
    $imagen = ['imagen'];

    $query = "INSERT INTO productos(id, nombre, descripcion, imagen, imagenPoster, precio) VALUES ('$nombre','$descripcion','$imagen','$poster','$precio')";

    print_r($query);
}


include("../includes/templates/header.php");
?>
<section class="home-section">
    <main class="contenedor container px-5">
        <h1>Administrador de juegos</h1>
        <a href="/admin/index.php" class="boton boton-verde">Volver</a>

        <h2>Crear Juego</h2>

        <form method="POST" action="/admin/crear.php" enctype="multipart/form-data">
            <table width="540">
                <tr valign="top">
                    <td width="500">Nombre</td>
                    <td width="414"><input type="text" id="name" name="nombre" placeholder="Nombre "></td>
                </tr>
                <tr valign="top">
                    <td>Imagen:</td>
                    <td><input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png"></td>
                </tr>
                <tr valign="top">
                    <td>Descripcion:</td>
                    <td><textarea id="descripcion" name="descripcion" cols="110" rows="15"></textarea></td>
                </tr>
                <tr valign="top">
                    <td>Poster:</td>

                    <td><input type="file" name="poster" id="poster" accept="image/jpeg, image/png"></td>
                </tr>

                <tr valign="top">
                    <td width="500">Costo</td>
                    <td width="414"><input type="number" name="precio" id="precio" placeholder="Precio del juego "
                            maxlength="15"></td>
                </tr>

            </table>
            <input name="restablecer" type="reset" id="restablecer" value="Restablecer">
            <button type="submit" name="enviar" id="enviar">Registrarse</button>
        </form>
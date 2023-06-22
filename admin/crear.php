<?php
include '../includes/funciones/db_conexion.php';

if (!empty($_FILES['imagen']['name'])) {
    $nombreArchivo = $_FILES['imagen']['name'];
    $rutaArchivo = 'imagenes/' . $nombreArchivo;
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    if (move_uploaded_file($_FILES['imagen']['tmp_name'], '../' . $rutaArchivo)) {
        $sql = "INSERT INTO productos (nombre, descripcion, imagen, precio) VALUES ('$nombre','$descripcion','$nombreArchivo',$precio)";
        
        if ($mysqli->query($sql) === TRUE) {
            echo "El juego se creó correctamente.";
            header('Location: crear2.php');
        } else {
            echo "Error al crear el juego: " . $mysqli->error;
        }
    } else {
        echo "Error al subir la imagen.";
    }
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
                    <td width="414"><input type="text" id="nombre" name="nombre" placeholder="Nombre"></td>
                </tr>

                <tr valign="top">
                    <td>Descripción:</td>
                    <td><textarea id="descripcion" name="descripcion" cols="110" rows="15"></textarea></td>
                </tr>

                <tr valign="top">
                    <td>Imagen:</td>
                    <td><input type="file" name="imagen"></td>
                </tr>

                <tr valign="top">
                    <td width="500">Costo</td>
                    <td width="414"><input type="number" name="precio" id="precio" placeholder="Precio del juego" maxlength="15"></td>
                </tr>
            </table>
            <input name="restablecer" type="reset" id="restablecer" value="Restablecer">
            <button type="submit" name="enviar" id="enviar">Registrarse</button>
        </form>
    </main>
</section>
<?php
require '../includes/config/database.php';
$db = conectarDB();

$errores =[];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_FILES['imagen'];
    $poster = $_FILES['imagenPoster'];
   

    if (!$nombre){
        $errores[]= "debes añadir un titulo";
    }
    if (!$descripcion){
        $errores[]= "debes añadir una descripcion";
    }
    if (!$precio){
        $errores[]= "debes añadir un precio";
    }
   
    if(empty($errores)){

    }
    $carpetaimagenes= 'imagenes';
    $nombreimagen= md5( uniqid( rand(), true)) . ".jpg";    
    move_uploaded_file($imagen['tmp_name'], $carpetaimagenes . $nombreimagen);

    $carpetaposter="imagenes";
    $nombreposter= md5( uniqid( rand(), true)) . ".jpg";    
    move_uploaded_file($poster['tmp_name'], $carpetaimagenes . $nombreposter);
    
   
    $query = "INSERT INTO productos (nombre, imagen, descripcion, imagenPoster, precio ) VALUES ( '$nombre', '$nombreimagen', '$descripcion', '$nombreposter', '$precio' ) ";
     
     
     $resultado = mysqli_query($db, $query);
   if($resultado){
    echo("Insertado correctamente");
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
        <table width="540" >
          <tr valign="top">
            <td width="500">Nombre</td>
            <td width="414"><input type="text" id="titulo" name="nombre" placeholder="Nombre "></td>
          </tr>
          <tr valign="top">
            <td>Imagen:</td>
            
            <td><input type="file"  id="imagen"  name="imagen" accept="image/jpeg, image/png" ></td>
          </tr>
          <tr valign="top">
            <td>Descripcion:</td>
            <td><textarea name="descripcion" cols="130" rows="15"></textarea></td>
          </tr>
          <tr valign="top">
            <td>Poster:</td>
            
            <td><input type="file"  name="imagenPoster" id="poster" accept="image/jpeg, image/png"></td>
          </tr>

          <tr valign="top">
            <td width="500">Costo</td>
            <td width="414"><input type="number" name="precio" id="titulo" placeholder="Precio del juego "maxlength="15"></td>
          </tr>

        </table>
          <input name="restablecer" type="reset" id="restablecer" value="Restablecer">
          <button type="submit" name="enviar" id="enviar">Registrarse</button>
        </form>
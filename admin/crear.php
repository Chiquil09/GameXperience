<?php
include("../includes/templates/header.php");
?>
<section class="home-section">
<main class="contenedor container px-5">
    <h1>Administrador de juegos</h1>
    <a href="/admin/index.php" class="boton boton-verde">Volver</a>

    <h2>Crear Juego</h2>
   
    <form>
        <table width="540" >
          <tr valign="top">
            <td width="500">Nombre</td>
            <td width="414"><input type="text" id="titulo" placeholder="Nombre del juego "></td>
          </tr>
          <tr valign="top">
            <td>Imagen:</td>
            
            <td><input type="file"  id="imagen"  accept="image/jpeg, image/png" ></td>
          </tr>
          <tr valign="top">
            <td>Descripcion:</td>
            <td><textarea name="consulta" cols="130" rows="15"></textarea></td>
          </tr>
          <tr valign="top">
            <td>Poster:</td>
            
            <td><input type="file"  id="imagen" accept="image/jpeg, image/png"></td>
          </tr>

          <tr valign="top">
            <td width="500">Precio</td>
            <td width="414"><input type="number" id="titulo" placeholder="Precio del juego "maxlength="15"></td>
          </tr>

          <tr valign="top">
            <td width="500">Calificacion</td>
            <td width="414"><input type="number" id="wc" placeholder="Ej: 5" min="1" max="5" ></td>
          </tr>


        </table>
        
          <input name="restablecer" type="reset" id="restablecer" value="Restablecer">
          <button type="submit" name="enviar" id="enviar">Registrarse</button>
        
      


        </form>
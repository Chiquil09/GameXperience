<?php
include("../includes/templates/header.php");
?>
<section class="home-section">
<main class="contenedor container px-5">
    <h1>Administrador de juegos</h1>
    <a href="/admin/index.php" class="boton boton-verde">Volver</a>

    <h2>Nuevo vendedor</h2>
   
    <form>
        <table width="540" >
          <tr valign="top">
            <td width="500">Nombre</td>
            <td width="414"><input type="text" id="titulo" placeholder="Nombre "></td>
          </tr>
          <tr valign="top">
            <td width="500">Correo</td>
            <td width="414"><input type="text" id="titulo" placeholder="Correo electronico "></td>
          </tr>
        </table>
        
          <input name="restablecer" type="reset" id="restablecer" value="Restablecer">
          <button type="submit" name="enviar" id="enviar">Registrarse</button>
        
      


        </form>
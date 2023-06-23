<?php
include("../includes/templates/header.php");
?>
<!DOCTYPE html>
<html>
<head>
  <style>
    
    body {
      background-color: #000;
      color: #fff;
      font-family: 'Arial', sans-serif;
    }

    .home-section {
      padding: 50px 0;
    }

    .contenedor {
      max-width: 800px;
      margin: 0 auto;
    }

    h1 {
      font-size: 36px;
      margin-bottom: 20px;
    }

    .boton {
      display: inline-block;
      padding: 10px 20px;
      background-color: #4effa3;
      color: #000;
      text-decoration: none;
      border-radius: 4px;
      margin-bottom: 20px;
    }

    h2 {
      font-size: 28px;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      margin-bottom: 20px;
    }

    td {
      padding: 10px;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      border: none;
      background-color: #111;
      color: #4effa3;
      border-radius: 4px;
      margin-bottom: 10px;
    }

    input[type="reset"],
    button[type="submit"] {
      padding: 10px 20px;
      border: none;
      background-color: #4effa3;
      color: #000;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    input[type="reset"]:hover,
    button[type="submit"]:hover {
      background-color: #4effa3;
      color: #000;
    }
  </style>
</head>
<body>
  <section class="home-section">
    <main class="contenedor container px-5">
      <h1>Administrador de juegos</h1>
      <a href="/admin/index.php" class="boton boton-verde">Volver</a>

      <h2>Nueva Categoria</h2>

      <form>
        <table width="540">
          <tr valign="top">
            <td width="500">Nombre</td>
            <td width="414"><input type="text" id="titulo" placeholder="Nombre"></td>
          </tr>
          
        </table>

        <input name="restablecer" type="reset" id="restablecer" value="Restablecer">
        <button type="submit" name="enviar" id="enviar">Registrarse</button>
      </form>
    </main>
  </section>
</body>
</html>

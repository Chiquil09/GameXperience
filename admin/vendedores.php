<?php
include '../includes/funciones/db_conexion.php';
include("../includes/templates/header.php");
if (!empty($_GET['nombre'])) {
    $nombre = $_GET['nombre'];

    $sql = "INSERT INTO generos(nombre) VALUES ('$nombre')";

    if ($mysqli->query($sql) === TRUE) {
        echo "Exito";
        header('Location: '.App.'/admin');
    } else {
        echo "Error al crear la categoria: " . $mysqli->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    
    <style>
        
        body {
            background-color: #101010;
            color: #fff;
        }

        .home-section {
            padding: 50px 0;
        }

        .contenedor {
            max-width: 800px;
            margin: 0 auto;
            background-color: #101010;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 30px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
        }

        td {
            padding: 10px;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #555;
            color: #fff;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        textarea {
            height: 150px;
        }

        input[type="file"] {
            margin-bottom: 10px;
        }

        input[type="reset"],
        button[type="submit"] {
            padding: 10px 20px;
            border: none;
            background-color: #4CAF50;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="reset"]:hover,
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<section class="home-section">
<main class="contenedor container px-5">
    <h1>Crear</h1>
    <a href="index.php" class="boton boton-verde mb-4">Volver</a>

    <h2>Nueva Categoria</h2>
   
    <form action="vendedores.php">
        <table width="540" >
          <tr valign="top">
            <td width="500">Categoria</td>
            <td width="414"><input type="text" id="nombre" name="nombre" placeholder="Nombre"></td>
          </tr>
        </table>
        
          <input name="restablecer" type="reset" id="restablecer" value="Restablecer">
          <button type="submit" name="enviar" id="enviar">Registrar</button>
        
      


    </form>
<?php
session_start();
$auth = $_SESSION['login'];
if(!$auth){
    header('Location: ../index.php');
}
include '../includes/funciones/db_conexion.php';
include("../includes/templates/header.php");
// Verificar si se ha enviado un ID válido
if (!empty($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    if (!$id) {
        header('Location: ' . App . '/admin');
    }

    // Obtener los datos del juego por ID
    $consulta = "SELECT * FROM usuarios WHERE id = ${id}";
    $resultado = $mysqli->query($consulta);
    $producto = $resultado->fetch_assoc();
}

// Procesar el formulario cuando se envíe
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);
    $correo = mysqli_real_escape_string($mysqli, $_POST['correo']);
    $password = mysqli_real_escape_string($mysqli, $_POST['contrasena']);

    // Verificar si se ha cargado una nueva imagen
    $sql = "UPDATE usuarios SET nombre = '$nombre', correo = '$correo', contrasena = '$password' WHERE id = $id";

    
    if ($mysqli->query($sql) === TRUE) {
        header('Location: ' . App . '/admin');
    } else {
        echo "Error al actualizar el juego: " . $mysqli->error;
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

<body>
    <section class="home-section">
        <main class="contenedor container px-5">
            <h1>Actualizar de usuarios</h1>
            <a href="admin/" class="boton boton-verde mb-4">Volver</a>

            <h2>Actualizar </h2>

            <form method="POST">
                <table width="540">

                    <tr class="input-box">
                        <td width="500">Correo</td>
                        <td width="414"><input type="text" id="correo" name="correo" placeholder="Email" value="<?php echo $producto['correo']; ?>"></td>
                    
                    </tr>

                    <tr class="input-box">
                        <td width="500">Contraseña</td>
                        <td width="414"><input type="text" id="contrasena" name="contrasena" placeholder="Contraseña" value="<?php echo $producto['contrasena']; ?>"></td>
                    
                    </tr>

                    <tr valign="top">
                        <td width="500">Nombre</td>
                        <td width="414"><input type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $producto['nombre']; ?>"></td>
                    </tr>
                </table>
                <input name="restablecer" type="reset" id="restablecer" value="Restablecer">
                <button type="submit" name="enviar" id="enviar">Actualizar</button>
            </form>
        </main>
    </section>
</body>

</html>
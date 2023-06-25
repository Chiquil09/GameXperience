<?php
session_start();
$auth = $_SESSION['login'];
if(!$auth){
    header('Location: ../index.php');
}
include '../includes/funciones/db_conexion.php';
include("../includes/templates/header.php");
if (!empty($_GET['puntuacion'])) {
    $puntuacion = $_GET['puntuacion'];
    $desarrollador = $_GET['desarrolador'];
    $genero_id = $_GET['genero_id'];

    $producto_id = $mysqli->query('SELECT id FROM productos ORDER BY id DESC');
    $id = $producto_id->fetch_array(MYSQLI_ASSOC);

    $consulta = 'INSERT INTO datos(puntuacion, desarrolador, genero_id, producto_id) VALUES (' . $puntuacion . ',"' . $desarrollador . '",' . $genero_id . ', ' . $id['id'] . ')';

    if ($mysqli->query($consulta) === TRUE) {
        echo "El juego se creó correctamente.";
        header('Location: '.App.'/admin');
    } else {
    }
} else {

    $sql = "SELECT * FROM generos";
    $result = $mysqli->query($sql);
}

?>
<!DOCTYPE html>
<html>

<head>
    
    <style>
    
        body {
            background-color: #101010;
            font-family: 'Arial', sans-serif;
            color: #fff;
        }

        .home-section {
            padding: 50px 0;
        }

        .contenedor {
            background-color: #101010;
            max-width: 800px;
            margin: 0 auto;
        }

        h2 {
            font-size: 28px;
            margin-bottom: 20px;
            border-bottom: 2px solid #fff;
            padding-bottom: 10px;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #888;
        }

        input[type="number"],
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #555;
            color: #fff;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        input[type="reset"],
        button[type="submit"] {
            padding: 10px 20px;
            border: none;
            background-color: #333;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="reset"]:hover,
        button[type="submit"]:hover {
            background-color: #666;
        }
    </style>
</head>

<body>
    <section class="home-section">
        <main class="contenedor container px-5">
            <h2>Datos Generales</h2>

            <form action="crear2.php">
                <table width="540">
                    <tr valign="top">
                        <td width="500">Puntuacion</td>
                        <td width="414"><input type="number" id="puntuacion" name="puntuacion" placeholder="Puntuacion"></td>
                    </tr>

                    <tr valign="top">
                        <td>Desarrollador:</td>
                        <td><input type="text" id="desarrolador" name="desarrolador"></input></td>
                    </tr>

                    <tr valign="top">
                        <td>Genero:</td>
                        <td width="414">
                            <select name="genero_id">
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($gen = $result->fetch_assoc()) {
                                ?>
                                        <option value="<?php echo $gen['id']; ?>"><?php echo $gen['nombre']; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                </table>
                <input name="restablecer" type="reset" id="restablecer" value="Restablecer">
                <button type="submit" name="enviar" id="enviar">Registrar</button>
            </form>
        </main>
    </section>
</body>

</html>
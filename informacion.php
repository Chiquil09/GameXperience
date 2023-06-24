<?php

include 'includes/funciones/db_conexion.php';

$id = $_GET['id'];

$query = 'SELECT productos.nombre AS pNombre, productos.descripcion,productos.imagen,productos.precio, datos.puntuacion, datos.desarrolador, generos.nombre AS gNombre FROM productos,datos,generos WHERE productos.id=datos.producto_id AND generos.id=datos.genero_id AND datos.producto_id="' . $id . '" limit 1';

$result = $mysqli->execute_query($query);
$info = null;
if (!empty($result)) {
    //$res = mysqli_fetch_array($result);
    //$info=$res;
    $info = $result->fetch_array(MYSQLI_ASSOC);
}
//print_r($info);
//echo $info['nombre'];
include 'includes/templates/header.php';
?>

<head>

    <style>
        body {
            background-color: #131313;
            font-family: 'Arial', sans-serif;
            color: #fff;
        }

        .contenedor {
            max-width: 900px;
            margin: 0 auto;
        }

        .parraf textarea {
            font-weight: bold;
            width: 100%;
            height: 50vh;
            color: var(--texto);
            background: #131313;
            border: #0b0b0b;
        }

        .pre div h2{
            position: fixed;
            right: 10%;
            background: var(--verde);
            border-radius: 10px;
            padding: 10px;
            color: #0b0b0b;
            font-size: 28px;
        }
        h3 {
            font-size: 45px;
        }

        strong {
            color: #ffff;
        }
    </style>
</head>
<section>
    <main>
        <div>
            <div class="section-fade-out">
                <img src="imagenes/<?php echo !empty($info) ? $info['imagen'] : ' '; ?>" alt="">
            </div>
        </div>
        <div>
            <div class="contenedor">
                <div class="profile">
                    <img src="imagenes/<?php echo !empty($info) ? $info['imagen'] : ' '; ?>">
                </div>
                <div class="d-flex inf pre">
                    <h3><?php echo !empty($info) ? $info['pNombre'] : ' '; ?></h3>
                    <div><h2>$<?php echo !empty($info) ? $info['precio'] : ' '; ?></h2></div>
                    
                </div>
                <div class="parraf">
                    <textarea disabled><?php echo !empty($info) ? $info['descripcion'] : ' '; ?></textarea>
                </div>
            </div>
            <div class="contenedor">
                <h3>Info:</h3>
                <div>
                    <h5>puntuacion:</h5>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="background: #fff; width: <?php echo !empty($info) ? $info['puntuacion'] * 10 : ' '; ?>%;" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="rounded-4 p-5 my-5" style="background: var(--fondo);">
                        <ul class="nav justify-content-center  ">
                            <li class="nav-item">
                                <a class="nav-link disabled"><strong>Genero: </strong><?php echo !empty($info) ? $info['gNombre'] : ' '; ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled"><strong>Calificaion: </strong><?php echo !empty($info) ? $info['puntuacion'] : ' '; ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled"><strong>Desarrollador: </strong><?php echo !empty($info) ? $info['desarrolador'] : ' '; ?></a>
                            </li>
                        </ul>
                        <ul class="nav justify-content-center  ">
                            <li class="nav-item">
                                <a class="nav-link"><i class="bi bi-hand-thumbs-down"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"><i class="bi bi-hand-thumbs-up-fill"></i></a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </main>
    <?php include 'includes/templates/footer.php'; ?>
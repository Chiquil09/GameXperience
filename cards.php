<?php
error_reporting(0);
include 'includes/funciones/db_conexion.php';

$id = $_GET['id'];

$query = 'SELECT * FROM productos';

$result = $mysqli->execute_query($query);

?>
<div class="container" id="custom-cards">
    <h2 class="pb-2 border-bottom">Juegos</h2>
    <div>
        <div class="row row-cols-1 row-cols-lg-2 align-items-stretch g-4 py-5">
            <div class="col">
                <div class="rounded-4 p-5 hover" style="background: var(--fondo);">
                    <p>GameXperience es una página web dedicada a brindar informacion de juegos como <i class="bi bi-arrow-right"></i></p>
                </div>
            </div>
            <div class="col">
                <div class="rounded-4 p-5" style="background: var(--fondo);">
                    <ul class="nav justify-content-center  ">
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Puntuacion del juego</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Desarrollador</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Puntuacion del juego</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Precio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Calificacion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
        <?php foreach ($result as $value) : ?>
            <div class="col">
                <a href="informacion.php?id=<?php echo !empty($value) ? $value['id'] : ' '; ?>" class="a">
                    <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url(imagenes/<?php echo !empty($value) ? $value['imagen'] : ' '; ?>);">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"><?php echo !empty($value) ? $value['nombre'] : ' '; ?></h3>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <i class="bi bi-controller p-2"></i>
                                    <i class="bi bi-cpu p-2"></i>
                                    <i class="bi bi-discord p-2"></i>
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <small>$<?php echo !empty($value) ? $value['precio'] : ' '; ?></small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach ?>
    </div>
</div>
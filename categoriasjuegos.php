<?php
error_reporting(0);
include 'includes/funciones/db_conexion.php';
if (!empty($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
    $query = 'SELECT * FROM generos WHERE nombre LIKE ' . '"%' . $nombre . '%"';
    //echo $query;
    $result = $mysqli->execute_query($query);

    $info = $result->fetch_array(MYSQLI_ASSOC);
    $mensaje = '';
    if (empty($info)) {
        $mensaje = 'categoria no encontrada';
    }
} else {
    $id = $_GET['id'];
    $query = 'SELECT * FROM generos';
    $result = $mysqli->execute_query($query);
}


?>
<div class="container" id="custom-cards">
    <h2 class="pb-2 border-bottom">Categorias</h2>
    <p><?php echo $mensaje; ?></p>
    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
        <?php foreach ($result as $value) : ?>
            <div class="col">
                <a href="clasificacion.php?id=<?php echo !empty($value) ? $value['id'] : ' '; ?>" class="a">
                    <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"><?php echo !empty($value) ? $value['nombre'] : ' '; ?></h3>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?php 

include 'includes/funciones/db_conexion.php';

$id = $_GET['id'];

$query = 'SELECT productos.nombre AS pNombre, productos.descripcion,productos.imagen, productos.imagenPoster,productos.precio, datos.puntuacion, datos.desarrolador, generos.nombre AS gNombre FROM productos,datos,generos WHERE productos.id=datos.producto_id AND generos.id=datos.genero_id AND datos.producto_id="'.$id.'" limit 1';

$result = $mysqli->execute_query($query);
$info=null;
if(!empty($result)){
    //$res = mysqli_fetch_array($result);
    //$info=$res;
    $info=$result->fetch_array(MYSQLI_ASSOC);
}
//print_r($info);
//echo $info['nombre'];
include 'includes/templates/header.php';
?>
<section class="home-section">
    <main>
        <div>
            <div class="section-fade-out">
                <img src="imagenes/<?php echo !empty($info)?$info['imagenPoster']:' '; ?>" alt="">
            </div>
        </div>
        <div class="d-flex">
            <div class="c1 container">
                <div class="profile">
                    <img src="imagenes/<?php echo !empty($info)?$info['imagen']:' '; ?>">
                </div>
                <div class="container d-flex inf">
                    <h3><?php echo !empty($info)?$info['pNombre']:' '; ?></h3>
                    <h2 class="text-body-secondary">$<?php echo !empty($info)?$info['precio']:' '; ?></h2>
                </div>
                <div class="parrafo">
                    <p><?php echo !empty($info)?$info['descripcion']:' '; ?></p>

                </div>
            </div>
            <div class="c2">
                <h5>puntuacion:</h5>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <ul class="py-3">
                    <li class="list-group-item">genero <?php echo !empty($info)?$info['gNombre']:' '; ?></li>
                    <li class="list-group-item">clasificacion <?php echo !empty($info)?$info['puntuacion']:' '; ?></li>
                    <li class="list-group-item">desarrollador <?php echo !empty($info)?$info['desarrolador']:' '; ?></li>
                    <li class="list-group-item"></li>
                </ul>
            </div>
        </div>
    </main>
    <?php include 'includes/templates/footer.php'; ?>
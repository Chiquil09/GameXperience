<?php 

include 'includes/funciones/db_conexion.php';

$id = $_GET['id'];

$query = 'SELECT productos.nombre AS pNombre, productos.descripcion, productos.id, productos.imagen, productos.imagenPoster,productos.precio, datos.puntuacion, datos.desarrolador, generos.id AS gId, generos.nombre AS gNombre FROM productos,datos,generos WHERE productos.id=datos.producto_id AND generos.id=datos.genero_id AND generos.id="'.$id.'"';

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
                <img src="imagenes/logo.gif" alt="">
            </div>
        </div>
        <div class="d-flex">
            <div class="container" id="custom-cards">
                <h2 class="pb-2 border-bottom"><?php echo !empty($value)?$value['gNombre']:' '; ?></h2>
                <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                    <?php foreach ($result as $value):?>
                        <div class="col">
                            <a href="/informacion.php?id=<?php echo !empty($value)?$value['id']:' '; ?>" class="a">
                                <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url(imagenes/<?php echo !empty($value)?$value['imagen']:' '; ?>);">
                                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                        <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"><?php echo !empty($value)?$value['pNombre']:' '; ?></h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </main>
    <?php include 'includes/templates/footer.php'; ?>
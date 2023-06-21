<?php
// importar la conexion
require 'includes/config/database.php';
$db = conectarDB();

// consultar
$query = "SELECT * FROM productos";

// obtener resultados
$resultado = mysqli_query($db, $query);
?>
<div class="container" id="custom-cards">
    <h2 class="pb-2 border-bottom">Juegos</h2>
    
    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
        <div class="col">
            <?php while($productos = mysqli_fetch_assoc($resultado)): ?>
            <a href="/informacion.php" class="a">
                <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url(imagenes/<?php echo $productos['imagenPoster']; ?>);">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"><?php echo $productos['nombre']; ?></h3>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="me-auto">
                                <img src="imagenes/perfil.png" width="32" height="32" class="rounded-circle border border-white">
                            </li>
                            <li class="d-flex align-items-center">
                                <small><?php echo $productos['precio']; ?></small>
                            </li>
                        </ul>
                    </div>
                </div>
            </a>
        </div> 
        <?php endwhile ?>
    </div>
   
</div>

<?php
// cerra la conexcion
mysqli_close($db);
?>
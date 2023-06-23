<?php 

include 'includes/funciones/db_conexion.php';



$query = 'SELECT * FROM productos';

$result = $mysqli->execute_query($query);

//echo $info['nombre'];
include 'includes/templates/header.php';
?>
    <section class="home-section">
        <main class="container">
            <div class="form-floating mb-3 d-flex p-2">
                <input type="text" class="form-control" name="formId1" id="formId1" placeholder="">
                <label for="formId1">escribir</label>
            </div>
            <div>
                <div class="album py-5">
                    <div class="col">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                            <?php foreach ($result as $value):?>
                            <div class="col">
                                <div class="carta shadow-sm">
                                    <img src="imagenes/<?php echo !empty($value)?$value['imagen']:' '; ?>"
                                        class="bd-placeholder-img card-img-top" width="100%">
                                    <div class="card-body">
                                        <p class="card-text"><?php echo !empty($value)?$value['nombre']:' '; ?></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm"><a class="btn1" href="link_name"><span>ver</span></a></button>
                                            </div>
                                            <small class="text-body-secondary">$<?php echo !empty($value)?$value['precio']:' '; ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
        </main>
<?php include 'includes/templates/footer.php'; ?>
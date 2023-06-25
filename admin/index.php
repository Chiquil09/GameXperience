<?php
session_start();
$auth = $_SESSION['login'];
if(!$auth){
    header('Location: index.php');
}
include '../includes/funciones/db_conexion.php';
include("../includes/templates/header.php");
// Escribir el Query
$query = "SELECT * FROM productos";

//Consultar la BD
$resultado = $mysqli->execute_query($query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
        //elimina la propiedad
        $query = "DELETE FROM productos WHERE id = {$id}";
        $resultado = $mysqli->execute_query($query);

        if ($resultado) {
            header('Location: ' . App . '/admin');
        }
    }
}
?>
<section class="">
    <main class="contenedor container px-5">
        <h1>Bienvenido: <?php echo "" . $_SESSION['usuario']; ?></h1>

        <a href="<?php echo App; ?>/admin/crear.php" class="boton boton-verde shadow-sm p-3 mb-5">Nuevo Juego</a>
        <a href="<?php echo App; ?>/admin/vendedores.php" class="boton boton-verde shadow-sm p-3 mb-5">Nueva categoria</a>
        <a href="<?php echo App; ?>/admin/crearUsuario.php" class="boton boton-verde shadow-sm p-3 mb-5">Nuevo admin</a>
        <h2 class="mt-5">Juegos</h2>
        <div class="table-responsive">
            <table class="table table-dark table-striped propiedades">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody> <!--MOSTRAR LOS RESULTADOS -->
                    <?php while ($productos = mysqli_fetch_assoc($resultado)) : ?>
                        <tr>
                            <th><?php echo $productos['id']; ?></th>
                            <th><?php echo $productos['nombre']; ?></th>
                            <th><img src="<?php echo App; ?>/imagenes/<?php echo $productos['imagen']; ?>" class="imagen-tabla rounded"></th>
                            <th><?php echo $productos['precio']; ?></th>
                            <th>
                                <a href="<?php echo App; ?>/admin/actualizar.php?id=<?php echo $productos['id']; ?>" class="btn border shadow-sm p-3 mb-5" role="button">
                                    Actualizar</a>
                                <form method="POST" class="w-100">
                                    <input type="hidden" name="id" value="<?php echo $productos['id']; ?>">
                                    <input type="submit" class="btn btn-danger shadow-sm p-3 mb-5" value="Eliminar" class="w-100">
                                </form>
                            </th>
                        </tr>
                    <?php endwhile; ?>

                </tbody>
            </table>
        </div>
        <?php
        include "tablaUsuarios.php";
        ?>
    </main>

    <?php
    //Cerra conexcion
    mysqli_close($mysqli);

    include("../includes/templates/footer.php");

    ?>
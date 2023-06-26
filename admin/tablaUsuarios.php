<?php
// Importar base de datos
include '../includes/funciones/db_conexion.php';

// Escribir el Query
$query = "SELECT * FROM usuarios";

//Consultar la BD
$resultado = $mysqli->execute_query($query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
        //elimina el usuario
        $query = "DELETE FROM usuarios WHERE id = {$id}";
        $resultado = $mysqli->execute_query($query);

    }
    header('Location: index.php');
}
?>
<table class="table table-dark table-striped propiedades">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">correo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody> <!--MOSTRAR LOS RESULTADOS -->
                <?php while ($productos = mysqli_fetch_assoc($resultado)) : ?>
                    <tr>
                        <th><?php echo $productos['id']; ?></th>
                        <th><?php echo $productos['nombre']; ?></th>
                        <th><?php echo $productos['correo']; ?></th>
                        <th>
                            <a href=" <?php echo App; ?>/admin/actualizarUsuario.php?id=<?php echo $productos['id'];?>" class="btn border shadow-sm p-3 mb-5">
                            Actualizar</a>
                            <br>
                            <form method="POST" class="w-100" action="<?php echo App; ?>/admin/tablaUsuarios.php">
                                <input type="hidden" name="id" value="<?php echo $productos['id']; ?>">
                                <input type="submit" class="btn btn-danger shadow-sm p-3 mb-5" value="Eliminar" class="w-100">
                            </form>
                        </th>
                    </tr>
                <?php endwhile; ?>


            </tbody>
        </table>
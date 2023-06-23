<?php
// Importar base de datos
include '../includes/funciones/db_conexion.php';

// Escribir el Query
$query = "SELECT * FROM productos";

//Consultar la BD
$resultado = $mysqli->execute_query($query);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    if($id){
        //elimina la propiedad
        $query = "DELETE FROM productos WHERE id = {$id}";
        $resultado = $mysqli->execute_query($query);

        if($resultado){
            header('Location: index.php');
        }
    }
    
}

session_start();
include("../includes/templates/header.php");
if (empty($_SESSION["permitido"])) {

    $url = "/";
    $statusCode = 303;
    header('Location: ' . $url, true, $statusCode);
    die;
} else {
    //echo "Hola Amigo ".$_SESSION['permitido'];
    if ($_SESSION['rol'] == 'admin') {
    } else {
        header('Location: /');
    }
}
?>
<section class="home-section">
    <main class="contenedor container px-5">
        <h1>Bienvenido: <?php echo "" . $_SESSION['permitido']; ?></h1>

        <a href="/admin/crear.php" class="boton boton-verde">Nuevo Juego</a>
        <a href="/admin/vendedores.php" class="boton boton-verde">Nueva categoria</a>
        <h2 class="mt-5">Juegos</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!--MOSTRAR LOS RESULTADOS -->
                <?php while ($productos = mysqli_fetch_assoc($resultado)) : ?>
                    <tr>
                        <th><?php echo $productos['id']; ?></th>
                        <th><?php echo $productos['nombre']; ?></th>
                        <th><img src="/imagenes/<?php echo $productos['imagen']; ?>" class="imagen-tabla"></th>
                        <th><?php echo $productos['precio']; ?></th>
                        <th>
                            <a href="/admin/actualizar.php?id=<?php echo $productos['id'];?>" class="boton-verde-block">
                            Actualizar</a>
                            <br>
                            <form method="POST" class="w-100">

                                <input type="hidden" name="id" value="<?php echo $productos['id']; ?>">

                                <input type="submit" class="boton-rojo-block" value="Eliminar" class="w-100">

                            </form>
                        </th>
                    </tr>
                <?php endwhile; ?>


            </tbody>
        </table>
    </main>

    <?php
    //Cerra conexcion
    mysqli_close($mysqli);

    include("../includes/templates/footer.php");
    ?>
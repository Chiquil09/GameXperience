<?php
session_start();
include("../includes/templates/header.php");
if(empty($_SESSION["permitido"])){

    $url="/index";
    $statusCode = 303;
    header('Location: ' . $url, true, $statusCode);
    die;
}else{
     //echo "Hola Amigo ".$_SESSION['permitido'];
     if($_SESSION['rol']=='admin'){

     }else{
        header('Location: /');
     }
}
?>
<section class="home-section">
<main class="contenedor container px-5">
    <h1>Administrador de juegos: <?php echo "".$_SESSION['permitido']; ?></h1>

    <a href="/admin/crear.php" class="boton boton-verde">Nuevo Juego</a>
    <a href="/admin/vendedores.php" class="boton boton-amarillo">Nuevo Vendedor</a>
    <h2>Juegos</h2>
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
            
        </tbody>
    </table>

    <h2>Vendedores</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!--MOSTRAR LOS RESULTADOS -->
            
        </tbody>
    </table>
    
</main>

<?php
include("../includes/templates/footer.php");
?>
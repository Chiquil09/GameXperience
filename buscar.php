<?php include 'includes/templates/header.php'; ?>
<section>
    <main>
    <div class="container1">
        <form class="search-bar" action="buscar.php">
            <input id="nombre" name="nombre" type="text" class="input-field" placeholder="Buscar">
            <button type="submit"><img src="imagenes/search.png"></button>
        </form>
    </div>
        <div class="container">
            <?php include 'categoriasjuegos.php'; ?>
        </div>
    </main>
    <?php include 'includes/templates/footer.php'; ?>
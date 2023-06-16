<?php include 'includes/templates/header.php'; ?>
<section class="home-section">
    <main class="container">
        <div class="h-25 p-5">
            <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel" data-bs-theme="dark">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="imagenes/halo-infinity.jpg" class="bd-placeholder-img" width="100%" height="100%">
                        <div class="container">
                            <div class="carousel-caption text-start">
                                <h1 class="color">Juegos Populares</h1>
                                <p class="opacity-75 color">Tenemos para ti una amplia variedad de los mejores juegos del 2023</p>
                                <p><a class="btn btn-lg btn-primary" href="#">Ir</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="imagenes/assasincreed.jpg" class="bd-placeholder-img" width="100%" height="100%">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1 class="color">Accion</h1>
                                <p class="color">Los mejores juegos de accion</p>
                                <p><a class="btn btn-lg btn-primary" href="#">Ir</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="imagenes/unreal.jpg" class="bd-placeholder-img" width="100%" height="100%">
                        <div class="container">
                            <div class="carousel-caption text-end">
                                <h1 class="color">Mejores Graficos</h1>
                                <p class="color">Los juegos con graficos ultra realistas</p>
                                <p><a class="btn btn-lg btn-primary" href="#">Ver</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div>

        </div>
        <div class="container">
            <?php include 'cards.php'; ?>
        </div>
    </main>
    <?php include 'includes/templates/footer.php'; ?>
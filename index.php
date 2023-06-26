<?php include 'includes/templates/header.php'; ?>
<section>
    <main>
        <div class="container py-5">
            <div class="row row-cols-1 row-cols-lg-2  g-4 py-5 text-body-emphasis">
                <div class="col">
                    <div class="p-5">
                        <h1 class="display-4">GameXperience</h1>
                        <p class="lead">Informate sobre tus juegos favoritos, y mucho mas</p>

                    </div>
                </div>
                <div class="col">
                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active h-100 overflow-hidden text-bg-dark shadow-lg">
                                <img src="imagenes/halo-infinity.jpg" class="bd-placeholder-img" width="100%" height="100%">
                                <div class="container">
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item h-100 overflow-hidden text-bg-dark shadow-lg">
                                <img src="imagenes/aventura.jpeg" class="bd-placeholder-img" width="100%" height="100%">
                                <div class="container">
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item h-100 overflow-hidden text-bg-dark shadow-lg">
                                <img src="imagenes/1303642.jpeg" class="bd-placeholder-img" width="100%" height="100%">
                                <div class="container">
                                    <div class="carousel-caption text-end">
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

            </div>
        </div>

        <div class="container">
            <?php include 'cards.php'; ?>
        </div>
        <div>
            <div class="container px-4 py-5">
                <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
                    <div class="col d-flex flex-column align-items-start gap-2">
                        <h2 class="fw-bold text-body-emphasis">Esta pagina fue creada para dar informacion de algunos juegos</h2>
                        <p class="text-body-secondary">En esta pagina han sido registrados mas de () juegos, en los cuales hay informacion del juego y su costo</p>
                        <a href="#" class="btn btn-primary btn-lg">Leer mas de quienes somos</a>
                    </div>

                    <div class="col">
                        <div class="row row-cols-1 row-cols-sm-1 g-4">
                            <div class="col d-flex flex-column gap-2">
                                <div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                                    <i class="bi bi-controller "></i>
                                </div>
                                <h4 class="fw-semibold mb-0 text-body-emphasis">Clasificacion del juego</h4>
                                <p class="text-body-secondary">En esta pagina encontraras juegos clasificados por su clasificacion</p>
                            </div>

                            <div class="col d-flex flex-column gap-2">
                                <div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                                    <i class="bi bi-info-lg" width="1em" height="1em"></i>
                                </div>
                                <h4 class="fw-semibold mb-0 text-body-emphasis">Informacion del juego</h4>
                                <p class="text-body-secondary">Cada juego cuenta con una pequeña descripcion de la misma</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include 'includes/templates/footer.php'; ?>
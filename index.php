<?php include 'includes/templates/header.php'; ?>
<section>
    <main>
        <div class="rounded-4">
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
                            <div class="carousel-caption text-start">
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
        <div class="container">
            <?php include 'cards.php'; ?>
        </div>
    </main>
    <?php include 'includes/templates/footer.php'; ?>
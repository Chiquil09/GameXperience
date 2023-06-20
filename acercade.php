<?php include 'includes/templates/header.php'; ?>
<section class="home-section">
    <main>
        <style>
            header {
                background-color: #000;
                padding: 20px;
                color: #fff;
                text-align: center;
            }

            h1 {
                margin: 0;
                font-size: 32px;
            }

            footer {
                background-color: #000;
                padding: 10px;
                color: #fff;
                text-align: center;
            }

            .left-div {
                float: left;
                width: 50%;
            }

            .right-div {
                float: right;
                width: 50%;
                
            }

            .texto{
                margin: 30px;
                text-align: justify;
            }

        </style>
        </head>
        <header>
            <h1>Bienvenido a GameXperience</h1>
        </header>

        <div class="left-div">
            <h1 class="texto">GameXperience</h1>
            <p class="texto">GameXperience es una página web dedicada a brindar una experiencia completa y enriquecedora en el mundo de los videojuegos.
            Nuestro objetivo principal es proporcionar a los jugadores una plataforma única donde puedan encontrar información, noticias,
            reseñas, guías y contenido relacionado con sus juegos favoritos.</p>
            <p class="texto">En GameXperience, nos enorgullece ofrecer una amplia variedad de contenido para satisfacer las necesidades de jugadores de todos los niveles y preferencias. Nuestro equipo de redactores y expertos en videojuegos está constantemente actualizando el sitio con las últimas noticias de la industria, avances de juegos, lanzamientos próximos y eventos destacados.
            Además de mantener a nuestros usuarios informados, también nos centramos en proporcionar reseñas detalladas y objetivas de juegos populares. Nuestros análisis van más allá de la superficie y profundizan en aspectos como jugabilidad, gráficos, narrativa y calidad general. Creemos que una buena reseña debe ser imparcial y ayudar a los jugadores a tomar decisiones informadas sobre qué juegos jugar.
            En GameXperience, también ofrecemos guías y consejos para ayudar a los jugadores a superar desafíos en sus juegos favoritos. Ya sea que necesites ayuda para completar una misión difícil, desbloquear secretos ocultos o mejorar tus habilidades en un juego de competición, encontrarás información útil y estrategias útiles en nuestras guías.
            Además de todo el contenido informativo, GameXperience también cuenta con una comunidad vibrante donde los jugadores pueden interactuar entre sí, compartir sus experiencias, discutir temas relacionados con los videojuegos y participar en eventos especiales. Valoramos la participación activa de nuestros usuarios y fomentamos un entorno amigable y respetuoso para todos.
            En resumen, GameXperience es una página web que busca ofrecer a los jugadores una experiencia completa y enriquecedora en el mundo de los videojuegos. Nuestro compromiso con la calidad, la información precisa y el contenido diverso nos convierte en el destino ideal para todos aquellos que deseen sumergirse en la apasionante industria de los videojuegos. ¡Únete a nosotros y descubre la verdadera esencia de la experiencia de juego!</p>
        </div>
        <div class="right-div">
        <div>
            <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel" data-bs-theme="dark">
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
                        <img src="imagenes/assasincreed.jpg" class="bd-placeholder-img" width="100%" height="100%">
                        <div class="container">
                            <div class="carousel-caption">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item h-100 overflow-hidden text-bg-dark shadow-lg">
                        <img src="imagenes/Halo-Infinite-en-PC-2021-1.jpg" class="bd-placeholder-img" width="100%" height="100%">
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        
    </main>
<?php include 'includes/templates/header.php'; ?>
<section class="home-section">
    <main>
        <div class="body">
            <section class="k">
                <img src="imagenes/stars.png" id="star">
                <img src="imagenes/moon.png" id="moon">
                <img src="imagenes/mountains_behind.png" id="mountains_behind">
                <h2 id="text">GAMEXPERIENCE</h2>
                <a href="#sec" id="btn">Explore</a>
                <img src="imagenes/mountains_front.png" id="mountains_front">
            </section>        
            <div class="sec" id="sec">
                <div class="cen">
                <!-- <h2>Nosotros</h2> -->
                 <img src="/imagenes/nuestroEquipo.png" class="h22" alt="">  
                </div>
            <p>GameXperience es una página web dedicada a brindar una experiencia completa y enriquecedora en el mundo de los videojuegos. 
            Nuestro objetivo principal es proporcionar a los jugadores una plataforma única donde puedan encontrar información, noticias, 
            reseñas, guías y contenido relacionado con sus juegos favoritos.En GameXperience, nos enorgullece ofrecer una amplia variedad 
            de contenido para satisfacer las necesidades de jugadores de todos los niveles y preferencias. Nuestro equipo de redactores y 
            expertos en videojuegos está constantemente actualizando el sitio con las últimas noticias de la industria, avances de juegos, 
            lanzamientos próximos y eventos destacados.e mantener a nuestros usuarios informados, también nos centramos en proporcionar 
            reseñas detalladas y objetivas de juegos populares. Nuestros análisis van más allá de la superficie y profundizan en aspectos 
            como jugabilidad, gráficos, narrativa y calidad general. Creemos que una buena reseña debe ser imparcial y ayudar a los jugadores
             a tomar decisiones informadas sobre qué juegos jugar.<br><br>
             En GameXperience, también ofrecemos guías y consejos para ayudar a los jugadores a superar desafíos en sus juegos favoritos. 
             Ya sea que necesites ayuda para completar una misión difícil, desbloquear secretos ocultos o mejorar tus habilidades en un juego
             de competición, encontrarás información útil y estrategias útiles en nuestras guías.
             Además de todo el contenido informativo, GameXperience también cuenta con una comunidad vibrante donde los 
             jugadores pueden interactuar entre sí, compartir sus experiencias, discutir temas relacionados con los videojuegos y 
             participar en eventos especiales. Valoramos la participación activa de nuestros usuarios y fomentamos un entorno amigable y 
             respetuoso para todos.
             En resumen, GameXperience es una página web que busca ofrecer a los jugadores una experiencia completa y enriquecedora en el 
             mundo de los videojuegos. Nuestro compromiso con la calidad, la información precisa y el contenido diverso nos convierte en el
             destino ideal para todos aquellos que deseen sumergirse en la apasionante industria de los videojuegos. ¡Únete a nosotros y 
             descubre la verdadera esencia de la experiencia de juego!</p>
        </div>
        </div>

        <script>
            let stars = document.getElementById('star');
            let moon = document.getElementById('moon');
            let mountains_behind = document.getElementById('mountains_behind');
            let text = document.getElementById('text');
            let btn = document.getElementById('btn');
            let mountains_front = document.getElementById('mountains_front');
            
            window.addEventListener('scroll', function(){
                let value = window.scrollY;
                stars.style.left = value * 0.25 + 'px';
                moon.style.top = value * 1.05 + 'px';
                mountains_behind.style.top = value * 0.5 + 'px';
                mountains_front.style.top = value * 0 + 'px';
                text.style.marginRight = value * 4 + 'px';
                text.style.marginTop = value * 1.5 + 'px';
                btn.style.marginTop = value * 1.5 + 'px';
            })
        </script>
    </main>
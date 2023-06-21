<?php include 'includes/templates/header.php'; ?>
<section class="home-section">
    <main>
            <div class="wrapper">
            <nav class="nav1">
            <div class="nav-menu" id="navMenu">
                <ul>
                    <li id="loginBtn" onclick="login()"><a href="#" class="link">Iniciar Sesion</a></li>
                    <li id="registerBtn" onclick="register()"><a href="#" class="link">Registrace</a></li>
                </ul>

            </div>
            <div class="nav-menu-btn">
                <i class="bx bx-menu" onclick="myMenuFunction()"></i>
            </div>
        </nav>

                <!----------------------------- Form box ----------------------------------->
                <div class="form-box">

                    <!------------------- login form -------------------------->

                    <div class="login-container" id="login">
                        <div class="top">
                            <header>INICIAR SESION</header>
                        </div>
                        <div class="input-box">
                            <input type="text" class="input-field" placeholder="Email">
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="input-box">
                            <input type="password" class="input-field" placeholder="Contraseña">
                            <i class="bx bx-lock-alt"></i>
                        </div>
                        <div class="input-box">
                            <input type="submit" class="submit" value="Registrace">
                        </div>
                    </div>

                    <!------------------- registration form -------------------------->
                    <div class="register-container" id="register">
                        <div class="top">
                            <header>REGISTRACE</header>
                        </div>
                        <div class="two-forms">
                            <div class="input-box">
                                <input type="text" class="input-field" placeholder="Nombre">
                                <i class="bx bx-user"></i>
                            </div>
                            <div class="input-box">
                                <input type="text" class="input-field" placeholder="Apellido">
                                <i class="bx bx-user"></i>
                            </div>
                        </div>
                        <div class="input-box">
                            <input type="text" class="input-field" placeholder="Email">
                            <i class="bx bx-envelope"></i>
                        </div>
                        <div class="input-box">
                            <input type="password" class="input-field" placeholder="Contraseña">
                            <i class="bx bx-lock-alt"></i>
                        </div>
                        <div class="input-box">
                            <input type="submit" class="submit" value="Registrace">
                        </div>
                    </div>
                </div>
            </div>


            <script>
                function myMenuFunction() {
                    var i = document.getElementById("navMenu1");

                    if (i.className === "nav-menu1") {
                        i.className += " responsive";
                    } else {
                        i.className = "nav-menu1";
                    }
                }
            </script>

            <script>
                var a = document.getElementById("loginBtn1");
                var b = document.getElementById("registerBtn1");
                var x = document.getElementById("login");
                var y = document.getElementById("register");

                function login() {
                    x.style.left = "4px";
                    y.style.right = "-520px";
                    a.className += " white-btn";
                    b.className = "btn";
                    x.style.opacity = 1;
                    y.style.opacity = 0;
                }

                function register() {
                    x.style.left = "-510px";
                    y.style.right = "5px";
                    a.className = "btn";
                    b.className += " white-btn";
                    x.style.opacity = 0;
                    y.style.opacity = 1;
                }
            </script>
    </main>
    <?php include 'includes/templates/footer.php'; ?>
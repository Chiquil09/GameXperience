<?php
session_start();
include 'includes/funciones/db_conexion.php';
//registance

if (empty($_GET['nombre'])) {

    if (!empty($_GET['email'])) {

        $correo = $_GET["email"];
        $password = $_GET["password"];
        $query = 'SELECT * FROM usuarios where correo="' . $correo . '" and contrasena="' . $password . '"';
        $result = $mysqli->execute_query($query);
        $info = $result->fetch_array(MYSQLI_ASSOC);
        if (!empty($info)) {
            $_SESSION["permitido"] = $info['correo'];
            $_SESSION['rol'] = 'admin';
            $url = "admin";
            $statusCode = 303;
            header('Location: ' . $url, true, $statusCode);
        }
    } //fin registrance
} else { //no esta vacio nombre quiere decir que voy a registrar nuevo usuario

    $correo = $_GET["email"];
    $password = $_GET["password"];
    $nombre = $_GET["nombre"];
    $apellido = $_GET["apellido"];
    $query = 'SELECT * FROM usuarios where correo="' . $correo . '"';
    $result = $mysqli->execute_query($query);

    if (($result->num_rows > 0)) {
        echo "usuario ya registrado";
    } else {
        echo "Registrando";
        $query = 'INSERT INTO usuarios(nombre, correo, contrasena,biblioteca_id) VALUES ("' . $nombre . '","' . $correo . '","' . $password . '", "1")';

        $result = $mysqli->execute_query($query);
    }
}
//unset($_SESSION["permitido"]);
?>
<?php include 'includes/templates/header.php'; ?>
<section>
    <main>
        <div class="wrapper">
            <nav class="nav1">
                <div class="nav-menu" id="navMenu">
                    <ul>
                        <li id="loginBtn" onclick="login()"><a href="#" class="link">Iniciar Sesion</a></li>
                        <!--  <li id="registerBtn" onclick="register()"><a href="#" class="link">Registrarse</a></li> -->
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
                    <form action="iniciarsesion.php">
                        <div class="top">
                            <header>Acceder a Admin</header>
                        </div>
                        <div class="input-box">
                            <input id="email" name="email" type="text" class="input-field" placeholder="Email">
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="input-box">
                            <input id="password" name="password" type="password" class="input-field" placeholder="Contraseña">
                            <i class="bx bx-lock-alt"></i>
                        </div>
                        <div class="input-box">
                            <input id="registance" type="submit" class="submit" value="Acceder">
                        </div>
                    </form>
                </div>

                <!------------------- registration form -------------------------->
                <!--                     <div class="register-container" id="register">
                        <form action="iniciarsesion.php">
                        <div class="top">
                            <header>REGISTRARSE</header>
                        </div>
                        <div class="two-forms">
                            <div class="input-box">
                                <input id="nombre" name="nombre" type="text" class="input-field" placeholder="Nombre">
                                <i class="bx bx-user"></i>
                            </div>
                            <div class="input-box">
                                <input id="appellido"  name="apellido" type="text" class="input-field" placeholder="Apellido">
                                <i class="bx bx-user"></i>
                            </div>
                        </div>
                        <div class="input-box">
                            <input id="email" name="email" type="text" class="input-field" placeholder="Email">
                            <i class="bx bx-envelope"></i>
                        </div>
                        <div class="input-box">
                            <input id="password" name="password" type="password" class="input-field" placeholder="Contraseña">
                            <i class="bx bx-lock-alt"></i>
                        </div>
                        <div class="input-box">
                            <input type="submit" class="submit" value="Registrace">
                        </div>
                        </form>
                    </div> -->
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
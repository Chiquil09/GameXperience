<?php include 'includes/templates/header.php';

require 'includes/config/database.php';
$conexion = mysqli_connect("localhost", "root", "", "gameperience");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $consulta = "SELECT * FROM usuarios WHERE correo='$correo'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_num_rows($resultado);

    if ($filas === 0) {
        $query = "INSERT INTO usuarios (correo, contraseña) VALUES ('$correo', '$contraseña')";
        mysqli_query($conexion, $query);
        // Aquí puedes mostrar un mensaje de éxito o redirigir al usuario a otra página
    } else {
        // Aquí puedes mostrar un mensaje de error o redirigir al usuario a otra página
    }
}
?>

<section class="home-section">
    <main>
        <form method="POST" action="procesar_registro.php">
            <div class="wrapper">
                <nav class="nav1">
                    <div class="nav-menu" id="navMenu">
                        <ul>
                            <li id="loginBtn" onclick="login()"><a href="#" class="link">Iniciar Sesion</a></li>
                            <li id="registerBtn" onclick="register()"><a href="#" class="link">Registrarse</a></li>
                        </ul>
                    </div>
                    <div class="nav-menu-btn">
                        <i class="bx bx-menu" onclick="myMenuFunction()"></i>
                    </div>
                </nav>

                <div class="form-box">
                    <div class="login-container" id="login">
                        <div class="top">
                            <header>INICIAR SESION</header>
                        </div>
                        <div class="input-box">
                            <input type="text" name="correo" class="input-field" placeholder="Email">
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="input-box">
                            <input type="password" name="contraseña" class="input-field" placeholder="Contraseña">
                            <i class="bx bx-lock-alt"></i>
                        </div>
                        <div class="input-box">
                            <input type="submit" class="submit" value="Iniciar Sesión">
                        </div>
                    </div>

                    <div class="register-container" id="register">
                        <div class="top">
                            <header>REGISTRARSE</header>
                        </div>
                        <div class="input-box">
                            <input type="text" name="registro_correo" class="input-field" placeholder="Email">
                            <i class="bx bx-envelope"></i>
                        </div>
                        <div class="input-box">
                            <input type="password" name="registro_contraseña" class="input-field" placeholder="Contraseña">
                            <i class="bx bx-lock-alt"></i>
                        </div>
                        <div class="input-box">
                            <input type="submit" class="submit" value="Registrarse">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <?php include 'includes/templates/footer.php'; ?>
</section>

<script>
    function myMenuFunction() {
        var i = document.getElementById("navMenu1");
        if (i.className === "nav-menu1") {
            i.className += " responsive";
        } else {
            i.className = "nav-menu1";
        }
    }

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

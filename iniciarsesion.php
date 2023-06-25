<?php
include 'includes/funciones/db_conexion.php';

// Autenticar el usuario 

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   /*  echo "<pre>";
    var_dump($_POST);
    echo "<pre>"; */

    $email = mysqli_real_escape_string($mysqli, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($mysqli,  $_POST['password']);

    if (!$email) {
        $errores[] = "El email es obligatorio";
    }

    if (!$password) {
        $errores[] = "El password es obligatorio";
    }

    if(empty($errores)){
        //Revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE correo = '${email}'";
        $resultado = $mysqli->execute_query($query);


        if ($resultado->num_rows) {
            // Revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);
           
            //Verificar si el password es correcto o no 
            $auth = password_verify($password, $usuario['contrasena']);
            if($auth){
                session_start();
                $_SESSION['usuario'] = $usuario['correo'];
                $_SESSION['login'] = true;
                header('Location: admin/index.php');

            }else{
                $errores[] = "El password es incorrecto";
            }
        }else{
            $errores[] = "El usuario no exciste";
        }

    }
}

include("includes/templates/header.php");
?>
<?php include 'includes/funciones/db_conexion.php'; ?>
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
                    <form method="POST">
                        <div class="top">
                            <header>Acceder a Admin</header>

                            <?php foreach ($errores as $error) : ?>
                                <div class="alerta error">
                                    <?php echo $error; ?>
                                </div>

                            <?php endforeach; ?>
                            <div class="input-box">
                                <input id="email" name="email" type="text" class="input-field" placeholder="Email" >
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
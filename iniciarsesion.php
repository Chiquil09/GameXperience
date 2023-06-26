<?php
session_start();
include 'includes/funciones/db_conexion.php';
//registance
$errores = [];
if (empty($_GET['nombre'])) {

    if (!empty($_GET['email'])) {

        $correo = $_GET["email"];
        $password = $_GET["password"];
        $query = 'SELECT * FROM usuarios where correo="' . $correo . '" and contrasena="' . $password . '"';
        $result = $mysqli->execute_query($query);
        $info = $result->fetch_array(MYSQLI_ASSOC);
        if (!empty($info)) {
            $_SESSION["permitido"] = $info['correo'];
            $_SESSION['rol'] = true;
            $statusCode = 303;
            header('Location: admin/index');
        }else{
            $errores[] = "El email o password incorrectos";
                
            
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
        <div class="container col-xl-10 col-xxl-8 px-4 py-5">
            <div class="row align-items-center g-lg-5 py-5">
                <div class="col-lg-7 text-center text-lg-start">
                    <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Acceder</h1>
                    <p class="col-lg-10 fs-4">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
                </div>
                <div class="col-md-10 mx-auto col-lg-5">
                    <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                        <div class="form-floating mb-3">
                            <input id="email" name="email" type="text" class="form-control" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <input id="registance" type="submit" class="w-100 btn btn-lg btn-primary"" value=" Acceder">
                        <hr class="my-4">
                        <small class="text-body-secondary">By clicking Sign up, you agree to the terms of use.</small>
                    </form>
                </div>
            </div>
        </div>
        <!--
        <div class="wrapper">
            <div class="form-box">
                <div class="login-container" id="login">
                    <form action="iniciarsesion.php">
                        <div class="top">
                            <header>Acceder a Admin</header>
                            <?php foreach ($errores as $error) : ?>
                                <div class="alerta error">
                                    <?php echo $error; ?>
                                </div>

                            <?php endforeach; ?>
                        </div>
                        <div class="input-box">
                            <input id="email" name="email" type="text" class="input-field" placeholder="Email" required>
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="input-box">
                            <input id="password" name="password" type="password" class="input-field" placeholder="Contraseña" required>
                            <i class="bx bx-lock-alt"></i>
                        </div>
                        <div class="input-box">
                            <input id="registance" type="submit" class="submit" value="Acceder">
                        </div>
                    </form>
                </div>

                                     <div class="register-container" id="register">
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
                    </div> 
            </div>
        </div>-->


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
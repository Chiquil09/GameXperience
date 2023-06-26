<?php
session_start();
if (empty($_SESSION["permitido"])) {

    $url = "../index.php";
    $statusCode = 303;
    header('Location: ' . $url, true, $statusCode);
    die;
} else {
    //echo "Hola Amigo ".$_SESSION['permitido'];
    if ($_SESSION['rol'] == true) {
    } else {
        header('Location: /');
    }
}

include '../includes/funciones/db_conexion.php';
include("../includes/templates/header.php");
if(!empty($_GET['email'])){
 
    $correo=$_GET["email"];
    $password=$_GET["password"];
    $query = 'SELECT * FROM usuarios where correo="'.$correo.'" and contrasena="'.$password.'"';
    $result = $mysqli->execute_query($query);
    $info=$result->fetch_array(MYSQLI_ASSOC);
    if (!empty($info)){
        $_SESSION["permitido"]=$info['correo'];
        $_SESSION['rol']='admin';
        $url="admin";
        $statusCode = 303;
        header('Location: ' . $url, true, $statusCode);
    }//fin registrance
    else{ //no esta vacio nombre quiere decir que voy a registrar nuevo usuario
        $correo=$_GET["email"];
        $password=$_GET["password"];
        $nombre=$_GET["nombre"];
        $query = 'SELECT * FROM usuarios where correo="'.$correo.'"';
        $result = $mysqli->execute_query($query);

        if(($result->num_rows > 0)){

        }else{
            $query = 'INSERT INTO usuarios(nombre, correo, contrasena) VALUES ("'.$nombre.'","'. $correo.'","'.$password.'")';
            $result = $mysqli->execute_query($query);
            
            header('Location: '.App.'/admin');
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    
    <style>
    
        body {
            background-color: #101010;
            font-family: 'Arial', sans-serif;
            color: #fff;
        }

        .home-section {
            padding: 50px 0;
        }

        .contenedor {
            background-color: #101010;
            max-width: 800px;
            margin: 0 auto;
        }

        h2 {
            font-size: 28px;
            margin-bottom: 20px;
            border-bottom: 2px solid #fff;
            padding-bottom: 10px;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #888;
        }

        input[type="number"],
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #555;
            color: #fff;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        input[type="reset"],
        button[type="submit"] {
            padding: 10px 20px;
            border: none;
            background-color: #333;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="reset"]:hover,
        button[type="submit"]:hover {
            background-color: #666;
        }
    </style>
</head>

<body>
    <section class="home-section">
        <main class="contenedor p-5">
            <form action="crearUsuario.php" onsubmit="return nuevacategoria(event);">
                <div class="top">
                    <header>REGISTRAR</header>
                </div>
                <a href="<?php echo App; ?>/admin/index.php" class="boton boton-verde my-4">Volver</a>
                <div class="input-box my-2">
                    <div class="input-box">
                        <input id="nombre" name="nombre" type="text" class="input-field" placeholder="Nombre">
                    </div>
                </div>
                <div class="input-box my-2">
                    <input id="email" name="email" type="text" class="input-field" placeholder="Email">
                </div>
                <div class="input-box my-2">
                    <input id="password" name="password" type="password" class="input-field" placeholder="Contraseña">
                </div>
                <div class="input-box my-2">
                    <input type="submit" class="submit" value="Registrar">
                </div>
            </form>
        </main>
    </section>
</body>

</html>
<?php
    include("../includes/templates/footer.php");
?>

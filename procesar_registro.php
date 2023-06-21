<?php
// Aquí debes incluir la configuración de la base de datos y establecer la conexión

// importar la conexion
require 'includes/config/database.php';
$db = conectarDB();

// consultar
$query = "SELECT * FROM usuarios";

// obtener resultados
$resultado = mysqli_query($db, $query);


// Verificar si se recibieron los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['registro_correo'];
    $contraseña = $_POST['registro_contraseña'];

    // Validar los datos recibidos (puedes agregar más validaciones según tus necesidades)
    if (!empty($correo) && !empty($contraseña)) {
        // Escapar los valores para evitar inyección de SQL (puedes usar otras técnicas más seguras)
        $correo = mysqli_real_escape_string($conexion, $correo);
        $contraseña = mysqli_real_escape_string($conexion, $contraseña);

        // Consultar si el correo ya está registrado
        $consulta = "SELECT * FROM usuarios WHERE correo='$correo'";
        $resultado = mysqli_query($conexion, $consulta);
        $filas = mysqli_num_rows($resultado);

        if ($filas === 0) {
            // Insertar el nuevo usuario en la base de datos
            $query = "INSERT INTO usuarios (correo, contraseña) VALUES ('$correo', '$contraseña')";
            mysqli_query($conexion, $query);

            // Redirigir al usuario a una página de éxito
            header('Location: registro_exitoso.php');
            exit;
        } else {
            // Redirigir al usuario a una página de error (correo ya registrado)
            header('Location: error_registro.php');
            exit;
        }
    } else {
        // Redirigir al usuario a una página de error (datos faltantes)
        header('Location: error_registro.php');
        exit;
    }
} else {
    // Redirigir al usuario si intenta acceder directamente a este archivo sin enviar el formulario
    header('Location: index.php');
    exit;
}
?>

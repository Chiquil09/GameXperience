<?php


// Conexión a la base de datos
$conn = new mysqli('localhost', 'root','', 'gameperience');

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Carpeta de destino para guardar las imágenes
$carpetaDestino = "/imagenes/";

// Obtener información del archivo subido
$nombreArchivo = $_FILES['imagen']['name'];
$rutaArchivo = $carpetaDestino . $nombreArchivo;

if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaArchivo)) {
    // Insertar información de la imagen en la base de datos
    $sql = "INSERT INTO tabla_imagenes (nombre, ruta) VALUES ('$nombreArchivo', '$rutaArchivo')";

    if ($conn->query($sql) === TRUE) {
        echo "La imagen se subió correctamente.";
    } else {
        echo "Error al insertar la información de la imagen en la base de datos: " . $conn->error;
    }
} else {
    echo "Error al subir la imagen.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

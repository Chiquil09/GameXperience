<?php

include 'includes/funciones/db_conexion.php';


$email='correo@correo.com';
$password ='123';

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

$query = " INSERT INTO usuarios (correo , contrasena) VALUES ('{$email}','{$passwordHash}'); ";

echo $query;

mysqli_query($mysqli, $query);
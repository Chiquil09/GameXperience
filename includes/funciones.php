<?php


define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');


function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMPLATES_URL . "/{$nombre}.php";
}

function estaAutenticado()
{
    session_start();
    /*SI NO TE AUTENTIFICAS LA URL TE LLEVARA AL HOME*/
    if (!$_SESSION["login"]) {
        header("Location: /");
    }
}

function debugear($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

//ESCAPA O SANITIZAR EL HTML /IMPORTANTISIMO/
function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}

//VALIDAR TIPO DE CONTENIDO
function validarTipoContenido($tipo)
{
    $tipos = ['vendedor', 'propiedad'];
    return in_array($tipo, $tipos);
}

//MUESTRA LOS MENSAJES
function mostrarNotificacion($codigo)
{
    $mensaje = '';
    switch ($codigo) {
        case 1:
            $mensaje = "Creado Correctamente";
            break;
        case 2:
            $mensaje = "Actualizado Correctamente";
            break;
        case 3:
            $mensaje = "Eliminado Correctamente";
            break;
        case 4:
            $mensaje = "El usuario esta asignado a una propiedad";
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function validarORedireccionar(string $url)
{
    $id = $_GET["id"];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if (!$id) {
        header("Location: {$url}");
    }

    return $id;
}

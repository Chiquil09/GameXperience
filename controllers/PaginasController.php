<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{
    public static function index(Router $router)
    {

        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }
    public static function nosotros(Router $router)
    {
        $router->render('paginas/nosotros');
    }
    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router)
    {
        $id = validarORedireccionar('/propiedad');

        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }
    public static function blog(Router $router)
    {
        $router->render('paginas/blog');
    }
    public static function entrada(Router $router)
    {
        $router->render('paginas/entrada');
    }
    public static function contacto(Router $router)
    {
        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuestas = $_POST['contacto'];

            //crear instancia
            $mail = new PHPMailer();

            //configurar smtp
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '8eb8fbba0b9028';
            $mail->Password = '6ad528f41048e8';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //configurar contenido
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tiene un nuevo mensaje';

            //habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';



            //definir el contenido
            $contenido = '<html>';
            $contenido .= '<p>Tiene un Nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';

            //Enviar de forma condicional algunos campos de email o telefono
            if ($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p>Eligio ser contactado por Teléfono:</p>';
                $contenido .= '<p>Telefono: ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p>Fecha contacto: ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p>Hora: ' . $respuestas['hora'] . '</p>';
            } else {
                $contenido .= '<p>Eligio ser contactado por Email:</p>';
                $contenido .= '<p>Email: ' . $respuestas['email'] . '</p>';
            }

            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Vende o Compra: ' . $respuestas['tipo'] . '</p>';
            $contenido .= '<p>Precio o Presupuesto: $' . $respuestas['precio'] . '</p>';
            $contenido .= '<p>Prefiere ser contactado por: ' . $respuestas['contacto'] . '</p>';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Este es un mensaje en html';

            //enviar el email
            if ($mail->send()) {
                $mensaje = "mensaje enviado correctamente";
            } else {
                $mensaje = "error al enviar mensaje";
            }
        }
        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}

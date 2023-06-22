<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::all();

        $vendedores = Vendedor::all();
        
        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }
    public static function crear(Router $router)
    {
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            //CREA NUEVA INSTANCIA
            $propiedad = new Propiedad($_POST['propiedad']);


            //++SUBIDA DE ARCHIVOS//
            //GENERAR UN NOMBRE UNICO
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //SETEAR LA IMAGEN
            //REALIZA UN RESIZE A LA IMAGEN CON INTERVENTION
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
            }



            //VALIDAR
            $errores = $propiedad->validar();


            if (empty($errores)) {    // SI NO HAY ERRORES LO VA A GUARDAR EN LA BD



                //CREAR UNA CARPETA
                $carpetaImagenes = "../../imagenes/";
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                //GUARDA LA IMAGEN EN EL SERVIDOR
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                //GUARDA EN LA BASE DE DATOS
                $propiedad->guardar();
            }
        }
        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }
    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('/admin');

        $propiedad =  Propiedad::find($id);

        $vendedores = Vendedor::all();

        $errores = Propiedad::getErrores();

        //metodo POST para ACTUALIZAR
        if ($_SERVER['REQUEST_METHOD'] === "POST") {


            //ASIGNAR LOS ATRIBUTOS
            $args = [];
            $args = $_POST['propiedad'];

            $propiedad->sincronizar($args);

            //VALIDACION
            $errores = $propiedad->validar();

            //GENERA NOMBRE UNICO DE LA IMAGEN
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            //SUBIDA DE ARCHIVOS
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
            }


            if (empty($errores)) {
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    //ALMACENAR LA IMAGEN
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $propiedad->guardar();
            }
        }

        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }
    public static function eliminar(Router $router)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            //VALIDAR ID
            $id = $_POST["id"];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }
}

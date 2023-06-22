<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;

class VendedorController
{
    public static function crear(Router $router)
    {
        $errores = Vendedor::getErrores();

        $vendedor = new Vendedor;

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            //CREAR NUEVA INSTANCIA
            $vendedor = new Vendedor($_POST['vendedor']);
            //VALIDAR CAMPOS VACIOS
            $errores = $vendedor->validar();

            //No hay errores->hay que guardarlos
            if (empty($errores)) {
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/crear', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }
    public static function actualizar(Router $router)
    {
        $errores = Vendedor::getErrores();
        $id = validarORedireccionar('/admin');

        $vendedor = Vendedor::find($id);

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            //ASIGNAR LOS VALORES
            $args = $_POST['vendedor'];
            //SINCRONIZAR OBT EN MEMORIA CON LO QUE EL USUARIO ESCRIBIO
            $vendedor->sincronizar($args);
            //VALIDACION
            $errores = $vendedor->validar();

            if (empty($errores)) {
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/actualizar', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }
    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            
            if ($id) {

                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {

                    $vendedor = Vendedor::find($id);

                    $vendedor->eliminar();
                }
            }
        }
    }
}

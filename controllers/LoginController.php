<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class LoginController
{
    public static function login(Router $router)
    {
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $auth = new Admin($_POST);

            $errores = $auth->validar();

            if (empty($errores)) {
                //verificar si el usuario existe
                $resultado = $auth->existeUsuario();

                if (!$resultado) {
                    //verificar si el usuario o no (mensaje error)
                    $errores = Admin::getErrores();
                } else {
                    //verificar el password
                    $autenticado = $auth->comprobarPassword($resultado);

                    if ($autenticado) {
                        //Autenticar al usuario
                        $auth->autenticar();

                    } else {
                        $errores = Admin::getErrores();
                    }
                }
            }
        }

        $router->render('auth/login', [
            'errores' => $errores
        ]);
    }
    public static function logout()
    {
        session_start();

        //llenar el arreglo de session
        $_SESSION = [];

        header('Location: /');
    }
}

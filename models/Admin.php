<?php

namespace Model;

class Admin extends ActiveRecord
{
    protected static $taba = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    function validar()
    {
        if (!$this->email) {
            self::$errores[] = 'El Email es obligatorio';
        }
        if (!$this->password) {
            self::$errores[] = 'El Password es obligatorio';
        }

        return self::$errores;
    }

    public function existeUsuario()
    {
        $query = "SELECT * FROM " . self::$taba . " WHERE email = '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);

        if (!$resultado->num_rows) {
            self::$errores[] = 'El Usuario no existe';
            return;
        }
        return $resultado;
    }
    public function comprobarPassword($resultado)
    {
        $usuario = $resultado->fetch_object();

        $autenticado = password_verify($this->password, $usuario->password);

        if (!$autenticado) {
            self::$errores[] = 'El password es incorreco';
        }

        return $autenticado;
    }

    public function autenticar(){
        session_start();

        //llenar el arreglo de session
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /admin');
    }
}

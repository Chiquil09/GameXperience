<?php

namespace Model;
class Propiedad extends ActiveRecord{
    
    protected static $tabla = 'productos';
    
    protected static $columnasDB = ["id", "nombre", "descripcion", "imagen", "imagenPoster", "precio"];

    public $id;
    public $nombre;
    public $descripcion;
    public $imagen;
    public $imagenPoster;
    public $precio;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->imagenPoster = $args['imagenPoster'] ?? '';
        $this->precio = $args['precio'] ?? '';
    }

    public function validar()
    {

        if (!$this->nombre) {
            self::$errores[] = "Debes añadir un nombre de juego";
        }

        if (!$this->descripcion) {
            self::$errores[] = "La descripcion es obligatoria";
        }

        if (strlen($this->imagen) < 50) {
            self::$errores[] = "debes añadir una imagen";
        }

        if (!$this->imagenPoster) {
            self::$errores[] = "debes añadir una image para el poster";
        }

        if (!$this->precio) {
            self::$errores[] = "precio";
        }

        return self::$errores;
    }


}

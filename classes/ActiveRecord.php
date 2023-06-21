<?php
namespace App;
class ActiveRecord{

    //BASE DE DATOS
    protected static $db;
    protected static $columnasDB = []; 
    protected static $tabla = '';

    //ERRORES
    public static $errores = [];
 
    public $id;
    public $imagen;

    //DEFINIR LA CONEXION A LA BD
    public static function setDB($database)
    {
        self::$db = $database;   //SELF HACE REFERENCIA A LOS ATRIBUTOS ESTATICOS
    }


    public function guardar()
    {
        if (!is_null($this->id)) {
            //Actualizar
            $this->actualizar();
        } else {
            $this->crear();
        }
    }


    public function crear()
    {
        //SANITIZAR DATOS
        $atributos = $this->sanitizarAtributos();

        //INSERTAR EN LA BASE DE DATOS
        $query = "INSERT INTO" . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";


        $resultado = self::$db->query($query);
        
        //MENSAJE DE EXITO
        if ($resultado) {
            //REDIRECCIONAR AL USUARIO. EN LA REDIRECCION PREVIAMENTE NO PUEDE HABER CODIGO HTML
            header("Location: /admin?resultado=1");
        }
    }
    public function actualizar()
    {
        //SANITIAR LOS DATOS
        $atributos = $this->sanitizarAtributos();
        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }
        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= "WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= "LIMIT 1 ";
        $resultado = self::$db->query($query);

        if ($resultado) {
            //REDIRECCIONAR AL USUARIO. EN LA REDIRECCION PREVIAMENTE NO PUEDE HABER CODIGO HTML
            header("Location: /admin?resultado=2");
        }
    }

    //ELIMINAR un registro
    public function eliminar()
    {
        
        $query = "DELETE FROM " .static::$tabla  . " WHERE id=" . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado) {
            $this->borrarImagen();
            header("location: /admin?resultado=3");
        }
    }

    //IDENTIFICAR Y UNIR LOS ATRIBUTOS DE LA BD
    public function atributos() //RECORRIENDO LAS COLUMNAS Y UNIENDO VALORES
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue; //IGNORA AL ID (PARA NO AGG AL ATRIBUTOS)
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos() //SANITIZA LOS DATOS
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) { //KEY MUESTRA ATRIBUTOS y VALUE LO QUE EL USUARIO ESCRIBE
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    //SUBIDA DE IMAGENES
    public function setImagen($imagen)
    {

        //ELIMINA LA IMAGEN PREVIA
        if (!is_null($this->id)) {
            $this->borrarImagen();
        }

        //ASIGNAR AL ATRIBUTOS DE LA IMAGEN EL NAME DE LA IMAGEN
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    //ELIMINA EL ARCHIVO
    public function borrarImagen()
    {
        //COMPROBAR SI EXISTE EL ARCHIVO
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }


    //VALIDACION
    public static function getErrores()
    {
        return static::$errores;
    }
    public function validar()
    {
        static ::$errores=[];
        return static::$errores;
    }
    //LISTAR TODAS LAS PORPIEDADES
    public static function all()
    {
        $query = "SELECT * FROM ". static::$tabla; //ESTO NOS ARROJA UN ARREGLO
    
        $resultado =  self::consultarSQL($query);
        return $resultado;
    }

    //OBTIENE DETERMiNADO NUMERO DE REGISTROS
    public static function get($cantidad)
    {
        $query = "SELECT * FROM ". static::$tabla . " LIMIT " . $cantidad; //ESTO NOS ARROJA UN ARREGLO
        $resultado =  self::consultarSQL($query);
        return $resultado;
    }
    
    //BUSCA UN REGISTRO POR SU ID
    public static function find($id)
    {
        $query = "SELECT * FROM " .static::$tabla . " WHERE id = {$id}";
        $resultado = self::consultarSQL($query);

        return array_shift($resultado); //ARRAY_SHIFT ARROJA EL PRIMER ELEMENTO DE UN ARREGLO
    }

    public static function consultarSQL($query)
    {
        //CONSULTAR LA BASE DE DATOS
        $resultado = self::$db->query($query);
        //ITERAR LOS RESULTADOS
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        //LIBERAR LA MEMORIA
        $resultado->free();

        //RETORNAR LOS RESULTADOS
        return $array;
    }
    protected static function crearObjeto($registro) //ESTE METODO LO CONVIERTE DE ARREGLO A OBJETO
    {
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) { //MAPEA LOS DATOS DE ARREGLOS A OBJETOS
                $objeto->$key = $value;
            }
        }
        return $objeto; //LOS RETORNA
    }

    //SINCRONIZA EL OBJETO EN MEMORIA CON LOS CAMBIOS REALIADOS POR EL USUARIO
    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

}

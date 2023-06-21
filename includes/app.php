<?php

require 'funciones.php';
require 'config/database.php';

//CONECTARNOS A LA BASE DE DATOS
$db = conectarDB();

use App\ActiveRecord;

ActiveRecord::setDB($db);
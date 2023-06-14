<?php

namespace App;

class Vendedor extends ActiveRecord {

    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido','telefono'];
    
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
}
<?php

namespace App;

class Propiedad extends ActiveRecord{
    protected static $columnasDB = ['id', 'titulo','precio','imagen', 'descripcion','habitaciones','wc','estacionamiento', 'creado','vendedorId'];
    protected static $tabla ='propiedades';

    
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;
    
}
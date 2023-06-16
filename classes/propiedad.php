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
    
    public function __construct($args =[]){
        $this->id = $args['id'] ?? NULL;  
        $this->titulo = $args['titulo'] ?? '';  
        $this->precio = $args['precio'] ?? '';  
        $this->imagen = $args['imagen'] ?? '';  
        $this->descripcion = $args['descripcion'] ?? '';  
        $this->habitaciones = $args['habitaciones'] ?? '';  
        $this->wc = $args['wc'] ?? '';  
        $this->estacionamiento = $args['estacionamiento'] ?? '';  
        $this->creado =  date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';  
    }


    public function validar(){
        
 
        if(!$this->titulo){
            self::$errores[]="debes añadir un titulo";
        }
        if(!$this->precio){
            self::$errores[]="debes añadir un precio";
        }
        if(strlen($this->descripcion)<50){
            self::$errores[]="debes añadir descripcion y debe tener menos de 50 caracteres";
        }
        if(!$this->habitaciones){
            self::$errores[]="debes añadir numero de habitaciones";
        }
        if(!$this->wc){
            self::$errores[]="debes añadir WC";
        }
        if(!$this->estacionamiento){
            self::$errores[]="debes añadir estacionamiento";
        }
        if(!$this->vendedorId){
            self::$errores[]="debes añadir un vendedor";
        }
        
        if(!$this->imagen) {
            self::$errores[]="La imagen es obligatoria.";
        }
   
            return self::$errores;
    }
}
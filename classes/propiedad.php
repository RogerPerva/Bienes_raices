<?php

namespace App;

class Propiedad{
    //Base de datos:
    //Protected porque unicamente se modifica en la clase y estatico porque no necesitamos instanciarlo.

    protected static $db;  //Protegido porque solo se puede acceder desde la clase y static porque no se isntancia ya que son los mimos datos siempre
    //Este no se va a reescribir nunca.
    protected static $columnasDB = ['id', 'titulo','precio','imagen', 'descripcion','habitaciones','wc','estacionamiento', 'creado','vendedorId'];
    
    //Errores o validacion.
    protected static $errores = []; //arreglo vacio que vamos a ir llenando en caso de que haya errores.

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
        $this->id = $args['id'] ?? '';  
        $this->titulo = $args['titulo'] ?? '';  
        $this->precio = $args['precio'] ?? '';  
        $this->imagen = $args['imagen'] ?? '';  
        $this->descripcion = $args['descripcion'] ?? '';  
        $this->habitaciones = $args['habitaciones'] ?? '';  
        $this->wc = $args['wc'] ?? '';  
        $this->estacionamiento = $args['estacionamiento'] ?? '';  
        $this->creado =  date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? 1;  
    }
    //-------------------------------------------------****STATICS****------------------------------------------------------
    //definir la conexion a la BD--------------------------------------------------
    public static function setDB($database){    //metodo que puede ser llamado sin necesidad de crear un objeto nuevo (instanciar)
        self::$db = $database; //self hace referencia a los atributos de una misma clase.
     }

    //Validacion--------------------------------------------------
       public static function getErrores(){ //metodo que puede ser llamado sin necesidad de crear un objeto nuevo (instanciar)
           return self::$errores;  //self porque esta etatico y retornamos errores.
       }

    //Lista todas las propiedades--------------------------------------------------
    public static function all(){
       $query = "SELECT * FROM propiedades";
       $resultado = self::consultarSQL($query);

    // debuguear($resultado);
        
       return $resultado;
    }

    //Busca un registro por us ID--------------------------------------------------
    public static function find($id){
           //Obtener los datos de la propiedad
           $query = "SELECT * FROM propiedades WHERE id = $id";
           $resultado  =self::consultarSQL($query);

           return array_shift($resultado);
    }

    public static function consultarSQL($query){
        //Consultar la base de datos
        $resultado = self::$db->query($query); //metodo query consulta a la base de datos

        //Iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = self::crearObjeto($registro);

        }
        //Liberar la memoria::: 
        $resultado->free();
        //Retornar los resultados
        return $array; //Regresamos array con objetos
    }


    //------------------------------------------------------****PROTECTEDS***----------------------------------------------------------------------------------------
    protected static function crearObjeto($registro){
        $objeto = new self;

        foreach($registro as $key => $value){ //recorre el arreglo asociativo.
            if(property_exists($objeto, $key)){ //"La función property_exists() verifica si una propiedad con el nombre especificado ($key) existe en el objeto ($objeto)."
                $objeto->$key = $value;
            }
        }
        return $objeto;//regresamos objeto a ConsultarSQL()
    }
    //--------------------------------------------------****PUBLICS****----------------------------------------------------------------------------------------
    public function eliminar(){
           
        //Eliminamos la propiedad
        $query = "DELETE FROM propiedades WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1 ";
        $resultado = self::$db->query($query);
        
        if($resultado){
            $this->borrarImagen();
            header('Location:/bienesraices/admin/index.php?mensaje=3');
        }

    }
    public function guardar(){
        if(isset($this->id)){
            //actualizar
            $this->actualizar();
        }else{
            //creando un nuevo registro
            $this->crear();
        }
    }
    
    public function crear(){
        //Sanitizar los datos.
        $atributos = $this->sanitizarAtributos();


        //Insertar en la base de datos.
        $query ="INSERT INTO propiedades ( ";
        $query .= join(', ', array_keys($atributos)); //array_keys nos permite acceder a las llaves (keys) de un arreglo y join nos vuelve el arreglo a string
        $query .=" ) VALUES (' "; 
        $query .= join("', '", array_values($atributos)); //array_values nos permite acceder a los valores del arreglo.
        $query .= " ') ";


        $resultado = self::$db->query($query);
      
        
    }
    public function actualizar(){
        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach($atributos as $key => $value){
            $valores [] = "$key='$value'";
        }
        $query=" UPDATE propiedades SET ";
        $query.=join(', ', $valores); //join nos convierte el array a string.
        $query.=" WHERE id = '".self::$db->escape_string($this->id)."' ";
        $query.= " LIMIT 1 ";

        $resultado = self::$db->query($query);
        if($resultado){
            //echo "Se ha enviado el formulario";
            //redireccionamos al usuario.
            header("Location: ../index.php?mensaje=2"); //  lo utilizamos para redireccionar a los usuarios.
     } 

    }

    //---------------------------------------------------------------------------------------
    //Identificar y unir los atributos de la base de datos
    public function atributos(){
        $atributos = [];
        foreach(self::$columnasDB as $columna):
            if($columna === 'id') continue; // Ignoramos porque no tenemos esa informacion.
            $atributos[$columna]=$this->$columna;
        endforeach;
        return $atributos;
    }
    
    //---------------------------------------------------------------------------------------
    //
    public function sanitizarAtributos(){
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach($atributos as $key =>$value){ //key son los atributos y value son los valores del arreglo
           s( $sanitizado[$key] = self::$db->escape_string($value)); //sanitizamos caracteres especiales y codigo html
            // $sanitizado[$key] = self::$db->htmlspecialchars($value);  Por alguna razon no es aceptada
        }

        return $sanitizado;
    }
    //---------------------------------------------------------------------------------------
    //
    public function setImagen($imagen){
        //Elimina la imagen previa:
        if(isset($this->id)){ //Si existe un ID significa que estamos editando
          $this->borrarImagen();
        }
        
        //Asignar al atributo de imagen el nombre de la imagen.
        if($imagen){
            $this->imagen=$imagen;

        }
    }
    //---------------------------------------------------------------------------------------

    //Eliminar el archivo::
    public function borrarImagen(){
    //Comprobar si existe el archivo
    $existeArchivo = file_exists(CARPETA_IMAGENES.$this->imagen);
    if($existeArchivo){
        unlink(CARPETA_IMAGENES.$this->imagen);
  }
    }
    //---------------------------------------------------------------------------------------
    //
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

    //Sincroniza el opbjeto en memoria con los cambios realizados por el usuario.
    public function sincronizar($args = []){
        foreach($args as $key => $value){
            if(property_exists($this, $key) && !is_null($value)){ // $this mantiene el objeto en memoria y key es la copia del objeto que invoco el metodo.
                $this->$key = $value;
            }
        }
    }




//      TODO LO PUBLIC SE HACE REFERENCIA COMO $this
//      TODO LO QUE ESTE COMO STATIC SE HACE REFERENCIA COMO sefl::
}
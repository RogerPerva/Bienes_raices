
<?php
 //Base de datos: ya esta en la clase App.

use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;

    require '../../includes/app.php';
//Autenticacion ---------------------------------------------------------------------------------

     estaAutenticado(); 

//AutenticacionFIN ---------------------------------------------------------------------------------

//--------------------***Errores***--------------------
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

//--------------------***Errores***--------------------    

//  Validacion de datos enviados por metodo post y recibidos por metodo get
//URL valido::::::::::Asigna el valor del parámetro id de la URL a la variable $id. Si el parámetro id no está presente en la URL, se asigna el valor null a $id. El operador ?? se utiliza para establecer un valor predeterminado en caso de que la variable no esté definida o sea nula.
           $id=$_GET['id'] ?? null;
           $id=filter_var($id, FILTER_VALIDATE_INT);
           if(!$id){
            header('Location: bienesraices/admin/index.php');
           }

           //Obtener los datos de la propiedad:
           $propiedad = Propiedad::find($id);
       
           //Asignamos los resultados
       
           echo "<pre>";
           var_dump($propiedad);
           echo "</pre>";
//-------------------------------------------------------------------------
    //Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado=mysqli_query($db,$consulta); //de esta forma estamos consultando a la base de datos y resultado tiene todos los vendedores
    
    //Arreglo con mensajes de errores.
    $errores = Propiedad::getErrores();

    //Ejecutar el codigo despues de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD']==='POST'){
        
        //Asignar los atributos.
        $args=$_POST['propiedad'];
       
        $propiedad->sincronizar($args); //sincronizamos los datos para actualizarlos
/////////////////////////////////////////////////////////////////////////////////////////////
 
/////////////////////////////////////////////////////////////////////////////////////////////
//Validacion
      $errores = $propiedad->validar();
//--------------------------**Subida de archivos**---------------------------------------------
//Crear nombre unico de imagen
$nombreImagen =md5(uniqid(rand(), true)).".jpg";

//--------------Setear la imagen.------------
//Realiza un resize a la imagen con intervention
if($_FILES['propiedad']['tmp_name']['imagen']){
$image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
$propiedad->setImagen($nombreImagen);
}

$propiedad->guardar();
    //Revisar que el arreglo de errores este vacio.
    if(empty($errores)){
        //Alamacenar imagen en disco duro
        $image->save(CARPETA_IMAGENES.$nombreImagen);
        $propiedad->guardar();
    }
    
}//llave del request method
    incluirTemplate('header');
    // echo phpinfo();
   ?>
    
    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>
        <a href="../index.php" class="boton boton-verde"> Volver</a>
        
        <?php            foreach($errores as $error): ?>
            <div class="alerta error">
                <?php        echo $error;          ?>
            </div>
        <?php            endforeach;       ?>
        
        <form class="formulario" method="POST" enctype="multipart/form-data">

        <?php include FORMULARIO_PROPIEDADES; ?>

            <input type="submit" value="Actualizar propiedad" class="boton boton-verde" > 
        </form>

    </main>
    
    <?php 

    //Cerramos conexion
    mysqli_close($db);
        incluirTemplate('footer');
    ?>
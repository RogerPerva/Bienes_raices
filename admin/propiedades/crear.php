
<?php
    //Base de datos:
    // require 'C:\apache\htdocs\bienesraices\includes\config\database.php';

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require '../../includes/app.php';
    use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;


    estaAutenticado();

    $propiedad = new Propiedad;
    //Consulta para obtener todos los vendedores.
    $vendedores = Vendedor::all();

  //---------------------------------------------------------------------------------

    //Arreglo con mensajes de errores.---------------------------------------
    $errores = Propiedad::getErrores();

    //Ejecutar el codigo despues de que el usuario envia el formulario
    
    if($_SERVER['REQUEST_METHOD']==='POST'){
        //Crea una nueva instancia
        $propiedad = new Propiedad($_POST['propiedad']);

        //--------------------------**Subida de archivos**---------------------
         //Crear nombre unico de imagen
         $nombreImagen =md5(uniqid(rand(), true)).".jpg";

        //--Setear la imagen.
         //Realiza un resize a la imagen con intervention
         if($_FILES['propiedad']['tmp_name']['imagen']){
         $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
         $propiedad->setImagen($nombreImagen);
        }

        $errores = $propiedad->validar();

    //Revisar que el arreglo de errores este vacio.
    if(empty($errores)){
    //Crear carpeta.
    if(!is_dir(CARPETA_IMAGENES)){
     mkdir(CARPETA_IMAGENES);
     }
    //Guarda la imagen en el servidor:
         $image->save(CARPETA_IMAGENES.$nombreImagen);
    //Guarda la imagen en la base de datos.
         $resultado = $propiedad->guardar();
    }
    }
    
    incluirTemplate('header');
    // echo phpinfo();
   ?>
    
    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="../index.php" class="boton boton-verde"> Volver</a>
        
        <?php            foreach($errores as $error): ?>
            <div class="alerta error">
                <?php        echo $error;          ?>
            </div>
        <?php            endforeach;       ?>
        
    <form class="formulario" method="POST" action="../propiedades/crear.php" enctype="multipart/form-data">

        <?php include FORMULARIO_PROPIEDADES; ?>

        <input type="submit" class="boton boton-verde" > 
    </form>

    </main>
    
    <?php 
        incluirTemplate('footer');
    ?>
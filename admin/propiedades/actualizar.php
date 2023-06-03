
<?php
    require '../../includes/funciones.php';
//Autenticacion ---------------------------------------------------------------------------------
    $auth= estaAutenticado();
    if(!$auth){ //si existe el login entonces se queda donde esta
        header('Location: /bienesraices/index.php'); //si no lo redireccionamos al inciio
    }
  //AutenticacionFIN ---------------------------------------------------------------------------------
 //Base de datos:
    // require 'C:\apache\htdocs\bienesraices\includes\config\database.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require '../../includes/config/database.php';
    $db = conectarDB();

//  Validacion de datos enviados por metodo post y recibidos por metodo get
//URL valido
           $id=$_GET['id'] ?? null;
           $id=filter_var($id, FILTER_VALIDATE_INT);
           if(!$id){
            header('Location: bienesraices/admin/index.php');
           }
           //Obtener los datos de la propiedad
           $consulta = "SELECT * FROM propiedades WHERE id = $id";
           $resultado=mysqli_query($db, $consulta);
           //Asignamos los resultados
           $propiedad= mysqli_fetch_assoc($resultado);
           echo "<pre>";
           var_dump($propiedad);
           echo "</pre>";
   
    //Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado=mysqli_query($db,$consulta); //de esta forma estamos consultando a la base de datos y resultado tiene todos los vendedores
    
    //Arreglo con mensajes de errores.
    $errores = [];
    
    $titulo = $propiedad['titulo'];
    $precio =$propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedorId = $propiedad['vendedorId'];
    $imagenPropiedad=$propiedad['imagen'];

    //Ejecutar el codigo despues de que el usuario envia el formulario
    
    if($_SERVER['REQUEST_METHOD']==='POST'){

        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";
        // exit;

        $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
        $precio = mysqli_real_escape_string($db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
        $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']) ?? 1;

        //Asignar files hacia una variable.
        $imagen = $_FILES['imagen'];
/////////////////////////////////////////////////////////////////////////////////////////////
 
/////////////////////////////////////////////////////////////////////////////////////////////
        var_dump($imagen['name']);
        
        if(!$titulo){
            $errores[]="debes añadir un titulo";
        }
        if(!$precio){
            $errores[]="debes añadir un precio";
        }
        if(strlen($descripcion)<50){
            $errores[]="debes añadir descripcion y debe tener menos de 50 caracteres";
        }
        if(!$habitaciones){
            $errores[]="debes añadir numero de habitaciones";
        }
        if(!$wc){
            $errores[]="debes añadir WC";
        }
        if(!$estacionamiento){
            $errores[]="debes añadir estacionamiento";
        }
        if(!$vendedorId){
            $errores[]="debes añadir un vendedor";
        }
        //Validar por tamaño (100kb maximo)
        $medida = 1000*1000;
        if($imagen['size']>$medida){
            $errores[]="La imagen es muy grande";
        }
        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";

    //Revisar que el arreglo de errores este vacio.
    if(empty($errores)){
        //Crear carpeta
        $carpetaImagenes ='../../imagenes/';
        //Existe ya la carpeta?
        if(!is_dir($carpetaImagenes)){
            //En caso de que no, se crea carpeta
        mkdir($carpetaImagenes);
        }

        //Subida de archivos, buscamos que este vacio o no la imagen
            if($imagen['name']){
                //eliminar imagen previa 
                unlink($carpetaImagenes . $propiedad['imagen']);
                 //Crear nombre unico para la nueva imagen
        $nombreImagen =md5(uniqid(rand(), true)).".jpg";

        //Subimos la imagen a la carpeta 
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes.$nombreImagen); //movemos el archivo temporal, al mover ya se guarda

            }else{
                //En caso de que no se haya modificado la imagen, asignamos el mismo nombre que ya tenia previo y lo mandamos la base de datos.
                $nombreImagen= $propiedad['imagen'];
            }
    
        //Insertar en la base de datos.
        $query ="UPDATE propiedades SET titulo = '$titulo', precio = '$precio', imagen = '$nombreImagen', descripcion = '$descripcion', habitaciones = $habitaciones, wc = $wc,
        estacionamiento = $estacionamiento, vendedorId = $vendedorId WHERE id = $id";

    //echo $query; 

            $resultado = mysqli_query($db,$query);
            if($resultado){
                //echo "Se ha enviado el formulario";
                //redireccionamos al usuario.
                header("Location: ../index.php?mensaje=2"); //  lo utilizamos para redireccionar a los usuarios.
              
        }
     } //if de la subida de archivos linea 107


       
    }

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

            <fieldset><!-- 1!-->
                <legend>Informacion general</legend>

                <label for="titulo">Titulo:</label>
                <input type="text"  id="titulo" name="titulo" placeholder="Titulo propiedad" value="<?php echo $propiedad['titulo']; ?>">

                <label for="precio">Precio:</label>
                <input type="number" name="precio" placeholder="Precio" value="<?php echo $propiedad['precio'] ?>">
                
                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">
                <img src="../../imagenes/<?php echo $imagenPropiedad ?>" alt="" class="imagen-small">

                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion" name="descripcion" > <?php echo $propiedad['descripcion']; ?></textarea>

            </fieldset><!-- 1!-->
            <fieldset><!-- 2!-->
                <legend>Informacion Propiedad</legend>
                
                <label for="habitaciones">Habitaciones:</label>
                <input type="number"  id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $propiedad['habitaciones']; ?>">
                
                <label for="wc">Baños:</label>
                <input type="number"  id="wc" name="wc" placeholder="Ej: 4" min="1" max="9" value="<?php echo $propiedad['wc']; ?>">
                
                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number"  id="estacionamiento" name="estacionamiento" placeholder="Ej: 2" min="1" max="9" value="<?php echo $propiedad['estacionamiento']; ?>">

            </fieldset><!-- 2!-->
            <fieldset> <!-- 3!-->
                <legend>Vendedor</legend>

                <select name="vendedor">
                <option selected value="<?php $propiedad['vendedorId']?>"></option>
                    <?php  while($vendedor= mysqli_fetch_assoc($resultado)):     ?> <!-- Nos retorna un arreglo asociativo-->
                        <option <?php echo $vendedorId === $vendedor['id'] ?'selected':''; ?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre']." ".$vendedor['apellido']; ?></option>
                        <?php  endwhile;     ?>
                </select>
            </fieldset><!-- 3!-->

            <input type="submit" value="Actualizar propiedad" class="boton boton-verde" > 
        </form>

    </main>
    
    <?php 

    //Cerramos conexion
    mysqli_close($db);
        incluirTemplate('footer');
    ?>
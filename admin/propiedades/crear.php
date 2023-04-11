
<?php
    //Base de datos:
    // require 'C:\apache\htdocs\bienesraices\includes\config\database.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require '../../includes/config/database.php';
    $db = conectarDB();
    //Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado=mysqli_query($db,$consulta); //de esta forma estamos consultando a la base de datos y resultado tiene todos los vendedores

    require '../../includes/funciones.php';
    incluirTemplate('header');

    //Arreglo con mensajes de errores.
    $errores = [];
    
    $titulo = '';
    $precio ='';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedorId = '';
    $creado=date('Y/m/d');

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
        $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);

        //Asignar files hacia una variable.
        $imagen = $_FILES['imagen'];

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
        
        if(!$imagen['name'] || $imagen['error']){
            $errores[]="La imagen es obligatoria.";
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
        //Subida de archivos
        //Crear carpeta.
        $carpetaImagenes ='../../imagenes/';
        if(!is_dir($carpetaImagenes)){
        mkdir($carpetaImagenes);
        
        }
         //Crear nombre unico de imagen
         $nombreImagen =md5(uniqid(rand(), true)).".jpg";

         //Subir imagen
         move_uploaded_file($imagen['tmp_name'], $carpetaImagenes.$nombreImagen); //movemos el archivo temporal, al mover ya se guarda
         

        
        //Insertar en la base de datos.
            $query ="INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId)
            VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedorId')";

            //echo $query;
            $resultado = mysqli_query($db,$query);
            if($resultado){
                //echo "Se ha enviado el formulario";
                //redireccionamos al usuario.
                header("Location: ../index.php?mensaje=1"); //  lo utilizamos para redireccionar a los usuarios.
              
        }
    }


       
    }

    
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

            <fieldset><!-- 1!-->
                <legend>Informacion general</legend>

                <label for="titulo">Titulo:</label>
                <input type="text"  id="titulo" name="titulo" placeholder="Titulo propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" name="precio" placeholder="Precio" value="<?php echo $precio; ?>">
                
                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion" name="descripcion" > <?php echo $descripcion; ?></textarea>

            </fieldset><!-- 1!-->
            <fieldset><!-- 2!-->
                <legend>Informacion Propiedad</legend>
                
                <label for="habitaciones">Habitaciones:</label>
                <input type="number"  id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">
                
                <label for="wc">Baños:</label>
                <input type="number"  id="wc" name="wc" placeholder="Ej: 4" min="1" max="9" value="<?php echo $wc; ?>">
                
                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number"  id="estacionamiento" name="estacionamiento" placeholder="Ej: 2" min="1" max="9" value="<?php echo $estacionamiento; ?>">

            </fieldset><!-- 2!-->
            <fieldset> <!-- 3!-->
                <legend>Vendedor</legend>

                <select name="vendedor">
                <option value="">--Seleccione--</option>
                    <?php  while($vendedor= mysqli_fetch_assoc($resultado)):     ?> <!-- Nos retorna un arreglo asociativo-->
                        <option <?php echo $vendedorId === $vendedor['id'] ?'selected':''; ?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre']." ".$vendedor['apellido']; ?></option>
                        <?php  endwhile;     ?>
                </select>
            </fieldset><!-- 3!-->

            <input type="submit" class="boton boton-verde" > 
        </form>

    </main>
    
    <?php 
        incluirTemplate('footer');
    ?>

<?php
    //Base de datos:
    // require 'C:\apache\htdocs\bienesraices\includes\config\database.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require '../../includes/config/database.php';
    $db = conectarDB();
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
    //Ejecutar el codigo despues de que el usuario envia el formulario
    
    if($_SERVER['REQUEST_METHOD']==='POST'){
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $habitaciones = $_POST['habitaciones'];
        $wc = $_POST['wc'];
        $estacionamiento = $_POST['estacionamiento'];
        $vendedorId = $_POST['vendedor'];
        
        if(!$titulo){
            $errores[]="debes añadir un titulo";
        }
        if(!$precio){
            $errores[]="debes añadir un precio";
        }
        if(strlen(!$descripcion)>10){
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
        
        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";

    //Revisar que el arreglo de errores este vacio.
    if(empty($errores)){
            //Insertar en la base de datos.
            $query ="INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedorId)
            VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$vendedorId')";
            //echo $query;
            $resultado = mysqli_query($db,$query);
            if($resultado){
                echo "Se ha enviado el formulario";
              
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
        
        <form class="formulario" method="POST" action="../propiedades/crear.php">

            <fieldset><!-- 1!-->
                <legend>Informacion general</legend>

                <label for="titulo">Titulo:</label>
                <input type="text"  id="titulo" name="titulo" placeholder="Titulo propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" name="precio" placeholder="Precio" value="<?php echo $precio; ?>">
                
                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion" name="descripcion">value="<?php echo $descripcion; ?>"</textarea>

            </fieldset><!-- 1!-->
            <fieldset><!-- 2!-->
                <legend>Informacion Propiedad</legend>
                
                <label for="habitaciones">Habitaciones:</label>
                <input type="number"  id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" <?php echo $habitaciones; ?>>
                
                <label for="wc">Baños:</label>
                <input type="number"  id="wc" name="wc" placeholder="Ej: 4" min="1" max="9" <?php echo $wc; ?>>
                
                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number"  id="estacionamiento" name="estacionamiento" placeholder="Ej: 2" min="1" max="9" <?php echo $estacionamiento; ?>>

            </fieldset><!-- 2!-->
            <fieldset> <!-- 3!-->
                <legend>Vendedor</legend>

                <select name="vendedor">
                    <option value="1">Rogelio</option>
                    <option value="2">Ulises</option>
                </select>
            </fieldset><!-- 3!-->

            <input type="submit" class="boton boton-verde" > 
        </form>

    </main>
    
    <?php 
        incluirTemplate('footer');
    ?>
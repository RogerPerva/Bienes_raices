
<?php
    //Base de datos:
    // require 'C:\apache\htdocs\bienesraices\includes\config\database.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require '../../includes/config/database.php';
    $db = conectarDB();

    echo "<pre>";
    var_dump($_SERVER['REQUEST_METHOD']);
    echo "</pre>";
    
    if($_SERVER['REQUEST_METHOD']==='POST'){
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        
    }

    require '../../includes/funciones.php';
    incluirTemplate('header');
    // echo phpinfo();
   ?>
    
    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="../index.php" class="boton boton-verde"> Volver</a>
        
        <form class="formulario" method="POST" action="../propiedades/crear.php">

            <fieldset><!-- 1!-->
                <legend>Informacion general</legend>

                <label for="titulo">Titulo:</label>
                <input type="text"  id="titulo" name="titulo" placeholder="Titulo propiedad">

                <label for="precio">Precio:</label>
                <input type="number" name="precio" placeholder="Precio">
                
                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion"></textarea>

            </fieldset><!-- 1!-->
            <fieldset><!-- 2!-->
                <legend>Informacion Propiedad</legend>
                
                <label for="habitaciones">Habitaciones:</label>
                <input type="number"  id="habitaciones" placeholder="Ej: 3" min="1" max="9">
                
                <label for="wc">Baños:</label>
                <input type="number"  id="wc" placeholder="Ej: 4" min="1" max="9">
                
                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number"  id="estacionamiento" placeholder="Ej: 2" min="1" max="9">

            </fieldset><!-- 2!-->
            <fieldset> <!-- 3!-->
                <legend>Vendedor</legend>

                <select>
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

<?php

    //Importar la conexion
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require '../includes/config/database.php';
    $db = conectarDB();

    //Escribir el query
    $consulta = "SELECT * FROM propiedades";
    
    //Consultar la base de datos
    $resultadoConsulta=mysqli_query($db,$consulta);

    //Mostrar los resultados 


    $resultado = $_GET['mensaje'] ?? null; //traemos de la url lo que tenga mensaje, lo que hace el doble signo de interrogacion es que si no esta adopta el null

    require '../includes/funciones.php';
    incluirTemplate('header');

   ?>
    
    <main class="contenedor seccion dark-mode">
        <h1>Administrador de bienes raices</h1>
        <?php 
        if(intval ($resultado) === 1): ?>
        <p class="alerta exito"> Anuncio creado correctamente</p>
        <?php endif ?>
        <a href="propiedades/crear.php" class="boton boton-verde"> Nueva propiedad</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php while($propiedad= mysqli_fetch_assoc($resultadoConsulta)):?>
                <tr>
                    <td><?php echo $propiedad['id']; ?></td>
                    <td><?php echo $propiedad['titulo'];?></td>
                    <td> <img src="../imagenes/<?php echo $propiedad['imagen'];?>" class="imagen-tabla" alt="imagen_casa"></td>
                    <td>$<?php echo $propiedad['precio']; ?></td>
                    <td>
                        <a href="#" class="boton-rojo-block">Eliminar</a>
                        <a href="#" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endwhile;?>
            </tbody>
        </table>
    </main>

    <?php 

    //Cerrar la conexion
                    mysqli_close($db);
        incluirTemplate('footer');
    ?>
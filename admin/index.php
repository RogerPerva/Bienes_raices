
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

    //VALIDAMOS CON REQUEST_METHOD, para que no nos aparezca como undefined. El post no existe hasta que se mande el request_method
    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT); //validamos que sea un numero
        
        if($id){
            //Eliminar el archivo de la propiedad (imagen)
            $query = "SELECT imagen FROM propiedades WHERE id = $id";
            $resultado = mysqli_query($db, $query);
            $propiedad=mysqli_fetch_assoc($resultado);

            unlink('../imagenes/'.$propiedad['imagen']);

            
            //Eliminamos la propiedad
            $query = "DELETE FROM propiedades WHERE id = $id";
            $resultado = mysqli_query($db, $query);
            if($resultado){
                header('Location:/bienesraices/admin/index.php?mensaje=3');
            }
        }
    
    }


    require '../includes/funciones.php';
    incluirTemplate('header');

   ?>
    
    <main class="contenedor seccion dark-mode">
        <h1>Administrador de bienes raices</h1>
        <?php 
        if(intval ($resultado) === 1): ?>
        <p class="alerta exito"> Anuncio creado correctamente</p>
        <?php elseif (intval ($resultado) === 2): ?>
            <p class="alerta exito"> Anuncio Actualizado correctamente</p>
        <?php elseif (intval ($resultado) === 3): ?>
            <p class="alerta exito"> Anuncio Eliminado correctamente</p>
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
                <?php while($propiedad = mysqli_fetch_assoc($resultadoConsulta)):?>
                <tr>
                    <td><?php echo $propiedad['id']; ?></td>
                    <td><?php echo $propiedad['titulo'];?></td>
                    <td> <img src="../imagenes/<?php echo $propiedad['imagen'];?>" class="imagen-tabla" alt="imagen_casa"></td>
                    <td>$<?php echo $propiedad['precio']; ?></td>
                    <td>
                        <form class="w-100" method="POST">
                            <?php
                            //Vamos a crear un input hidden para que se manden datos de manera que el usuarion no pueda verlo
                            ?>
                            <input type="hidden" name="id" value="<?php echo $propiedad['id'] ?>">
                            <input type="submit" value="Eliminar" class="boton-rojo-block">
                        </form>
                        <a href="/bienesraices/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']?>" class="boton-amarillo-block">Actualizar</a>
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
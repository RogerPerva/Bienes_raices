
<?php    //Importar la conexion
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    require '../includes/app.php';

    //Importar las clases 
    use App\Propiedad;
    use App\Vendedor;

    $auth= estaAutenticado();
    
    //Implementar un método para obtener todas las propiedades con ActiveRecord.
    $propiedades =  Propiedad::all();
    $vendedores = Vendedor::all();


    //Mostrar los resultados 
    $resultado = $_GET['mensaje'] ?? null; //traemos de la url lo que tenga mensaje, lo que hace el doble signo de interrogacion es que si no esta adopta el null

    //VALIDAMOS CON REQUEST_METHOD, para que no nos aparezca como undefined. El post no existe hasta que se mande el request_method
    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        //Validar ID.
    $id = $_POST['id'];
      
    $id = filter_var($id, FILTER_VALIDATE_INT); //validamos que sea un numero
    
    if($id){

        $tipo=$_POST['tipo'];
        if(validarTipoContenido($tipo)){
            //Compara lo que vamos a eliminar
            if($tipo === 'vendedor'){
                $vendedor = Vendedor::find($id);
                $vendedor->eliminar();
            }else{
                $propiedad = Propiedad::find($id);
                $propiedad->eliminar();
            }
        }
    }
}


    
    incluirTemplate('header');

   ?>
    
    <main class="contenedor seccion dark-mode">
        <h1>Administrador de bienes raices</h1>
        <?php 
            $mensaje = mostrarNotificacion( intval($resultado) ); 
        if($mensaje){  ?>
            <p class="alerta exito"><?php echo s($mensaje) ?></p>
        <?php }   ?>

        <a href="propiedades/crear.php" class="boton boton-verde"> Nueva propiedad</a>
        <a href="vendedores/crear.php" class="boton boton-amarillo"> Nuevo(a) vendedor</a>
        <h2>Propiedades</h2>

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
                <?php foreach($propiedades as $key => $value):?>
                <tr>
                    <td><?php echo $value->id; ?></td>
                    <td><?php echo $value->titulo;?></td>
                    <td> <img src="../imagenes/<?php echo $value->imagen;?>" class="imagen-tabla" alt="imagen_casa"></td>
                    <td>$<?php echo $value->precio; ?></td>
                    <td>
                        <form class="w-100" method="POST">
                            <?php
                            //Vamos a crear un input hidden para que se manden datos de manera que el usuarion no pueda verlo
                            ?>
                            <input type="hidden" name="id" value="<?php echo $value->id ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" value="Eliminar" class="boton-rojo-block">
                        </form>
                        <a href="/bienesraices/admin/propiedades/actualizar.php?id=<?php echo $value->id?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>

        <h2>Vendedores</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Completo</th>
                   
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($vendedores as $key => $value):?>
                <tr>
                    <td><?php echo $value->id; ?></td>
                    <td><?php echo $value->nombre . " ". $value->apellido;?></td>
                    <td><?php echo $value->telefono; ?></td>
                    <td>
                        <form class="w-100" method="POST">
                            <?php
                            //Vamos a crear un input hidden para que se manden datos de manera que el usuarion no pueda verlo
                            ?>
                            <input type="hidden" name="id" value="<?php echo $value->id ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" value="Eliminar" class="boton-rojo-block">
                        </form>
                        <a href="/bienesraices/admin/vendedores/actualizar.php?id=<?php echo $value->id?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </main>

    <?php 

    //Cerrar la conexion
                    mysqli_close($db);
        incluirTemplate('footer');
    ?>
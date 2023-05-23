<?php
    //importar la conexion
     
        $db = conectarDB();
    //Consultar la base de datos
        $query = "SELECT * FROM propiedades LIMIT $limite";
    //Obtener los resultados
        $resultado = mysqli_query($db, $query);
?>
<div class="contenedor-anuncios"><!-- .contenido-anuncio -->
    <?php
        while ($propiedad =mysqli_fetch_assoc($resultado)):
    ?>
            <div class="anuncio">
                <picture>
                    <img src="/bienesraices/imagenes/<?php echo $propiedad['imagen'];?>" alt="anuncio" loading="lazy">
                </picture>
                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad['titulo']; ?></h3>
                    <p><?php echo $propiedad['descripcion']; ?></p>
                    <p class="precio"><?php echo $propiedad['precio']; ?></p>

                    <ul class="iconos-caracteristicas">
                        <li>
                            <img src="build/img/icono_wc.svg" alt="icono wc" loaging="lazy">
                            <p> <?php echo $propiedad['wc']; ?> </p>
                        </li>
                        <li>
                            <img src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loaging="lazy">
                            <p> <?php echo $propiedad['estacionamiento']; ?></p>
                        </li>
                        <li>
                            <img src="build/img/icono_dormitorio.svg" alt="icono dormitorio" loaging="lazy">
                            <p> <?php echo $propiedad['habitaciones']; ?></p>
                        </li>
                    </ul>
                    <a href="anuncio.php?id=<?php echo $propiedad['id'];  ?>" class="boton-amarillo-block">
                        Ver propiedad
                    </a>
                </div> <!-- .contenido-anuncio -->
            </div><!--.anuncio-->
            <?php
                endwhile;
            ?>
        </div><!-- .contenedor de anuncios-->

        <?php
            //Cerrar la conexion
                mysqli_close($db);
            //Cerramos la conexion de $db

        ?>
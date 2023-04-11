
<?php
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
                <tr>
                    <td>1</td>
                    <td>Casa en la playa</td>
                    <td> <img src="../imagenes/fa97021df080adbe3138c6d2106ba662.jpg" class="imagen-tabla" alt="imagen_casa"></td>
                    <td>$1230000,00</td>
                    <td>
                        <a href="#" class="boton-rojo-block">Eliminar</a>
                        <a href="#" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>

    <?php 
        incluirTemplate('footer');
    ?>
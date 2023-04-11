
<?php
    $resultado = $_GET['mensaje'] ?? null; //traemos de la url lo que tenga mensaje, lo que hace el doble signo de interrogacion es que si no esta adopta el null

    require '../includes/funciones.php';
    incluirTemplate('header');

   ?>
    
    <main class="contenedor seccion">
        <h1>Administrador de bienes raices</h1>
        <?php 
        if(intval ($resultado) === 1): ?>
        <p class="alerta exito"> Anuncio creado correctamente</p>
        <?php endif ?>
        <a href="propiedades/crear.php" class="boton boton-verde"> Nueva propiedad</a>
    </main>

    <?php 
        incluirTemplate('footer');
    ?>
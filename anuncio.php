<?php
require 'includes/app.php';

use App\Propiedad;
incluirTemplate('header');

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT); //validamos que sea un numero

if (!$id) {
    header('Location:/');
}

$propiedad = Propiedad::find($id);


?>

<main class="contenedor seccion contenido-centrado">
    <h1> <?php echo $propiedad->titulo; ?></h1>
    <img src="/bienesraices/imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio" loading="lazy">

    <div class="resumen-propiedad">
        <p class="precio">$ <?php echo $propiedad->precio; ?> </p>
        <ul class="iconos-caracteristicas">
            <li>
                <img src="build/img/icono_wc.svg" alt="icono wc" loaging="lazy">
                <p> <?php echo $propiedad->wc; ?></p>
            </li>
            <li>
                <img src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loaging="lazy">
                <p> <?php echo $propiedad->estacionamiento; ?></p>
            </li>
            <li>
                <img src="build/img/icono_dormitorio.svg" alt="icono dormitorio" loaging="lazy">
                <p> <?php echo $propiedad->habitaciones; ?></p>
            </li>
        </ul>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem corporis inventore possimus consectetur
            excepturi, beatae natus animi non eligendi aliquam sit sunt eius. Maiores veniam enim est consectetur l
            audantium. Porro! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem c
            excepturi, beatae natus animi non eligendi aliquam sit sunt eius. Maiores veniam enim est consectetur l
            audantium. Porro! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem corp
            excepturi, beatae natus animi non eligendi aliquam sit sunt eius. Maiores veniam enim est consectetur l
            audantium. Porro!
        </p>
    </div>
</main>

<?php

incluirTemplate('footer');
?>
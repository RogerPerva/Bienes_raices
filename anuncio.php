
<?php
        require 'includes/funciones.php';
        incluirTemplate('header');
   ?>
    
    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en venta frente al bosque</h1>
        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="imagen de la propiedad">
        </picture>
        <div class="resumen-propiedad">
            <p class="precio">$3,000,000.00  </p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img src="build/img/icono_wc.svg" alt="icono wc" loaging="lazy">
                    <p>3</p>
                </li>
                <li>
                    <img src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loaging="lazy">
                    <p>3</p>
                </li>
                <li>
                    <img src="build/img/icono_dormitorio.svg" alt="icono dormitorio" loaging="lazy">
                    <p>4</p>
                </li>
            </ul>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem corporis inventore possimus consectetur
                     excepturi, beatae natus animi non eligendi aliquam sit sunt eius. Maiores veniam enim est consectetur l
                     audantium. Porro!                     Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem c
                     excepturi, beatae natus animi non eligendi aliquam sit sunt eius. Maiores veniam enim est consectetur l
                     audantium. Porro!                     Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem corp
                     excepturi, beatae natus animi non eligendi aliquam sit sunt eius. Maiores veniam enim est consectetur l
                     audantium. Porro!
                </p>
        </div>
    </main>
    
    <?php 
        incluirTemplate('footer');
    ?>
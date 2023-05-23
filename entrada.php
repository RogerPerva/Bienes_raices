
<?php
        require 'includes/app.php';
        incluirTemplate('header');
   ?>
    
    <main class="contenedor seccion contenido-centrado">
        <h1>Guia para la decoracion de tu hogar</h1>
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="imagen de la propiedad">
        </picture>
        <p class="informacion-meta">Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>
        <div class="resumen-propiedad">
            <p class="precio">$3,000,000.00  </p>
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
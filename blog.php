
<?php
        require 'includes/funciones.php';
        incluirTemplate('header');
   ?>
    
    <main class="contenedor seccion contenido-centrado">
        <h1> Nuestro blog</h1>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog4.webp" type="image/webp">
                    <source srcset="build/img/blog4.jpeg" type="image/jpeg">
                    <img src="build/img/blog4.jpg" alt="Texto entrada blog" loading="lazy">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.html">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el: <span>20/10/2020</span>por: <span>Admin</span></p>
                    <p>
                        Consejos para contruir una terraza enb el techo de tu csas con los mejores materiale sy ahorrando dinero
                    </p>
                </a>
            </div>

        </article> <!--Article1-->
       
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpeg" type="image/jpeg">
                    <img src="build/img/blog2.jpg" alt="Texto entrada blog" loading="lazy">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.html">
                    <h4>guia para la decorazion de tu hogar</h4>
                    <p>Escrito el: <span>20/10/2020</span>por: <span>Admin</span></p>
                    <p>
                        Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores 
                        para darle vida a tu espacio.
                    </p>
                </a>
            </div>

        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <source srcset="build/img/blog3.jpeg" type="image/jpeg">
                    <img src="build/img/blog3.jpg" alt="Texto entrada blog" loading="lazy">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.html">
                    <h4>guia para la decorazion de tu hogar</h4>
                    <p>Escrito el: <span>20/10/2020</span>por: <span>Admin</span></p>
                    <p>
                        Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores 
                        para darle vida a tu espacio.
                    </p>
                </a>
            </div>

        </article>
    </main>
    
    <?php 
        incluirTemplate('footer');
    ?>

   <?php
   
   include './includes/app.php';
        

        incluirTemplate('header', $inicio=true);
   ?>
    
    <main class="contenedor seccion">
    <h1>Más sobre nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img class="icono" src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae molestiae aspernatur laborum, aliquid quod nobis! Illum architecto
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo temporibus quos perferendis est mollitia magnam incidunt accusamus 
                    similique nisi, aspernatur deserunt error praesentium itaque saepe dolor quidem adipisci. Distinctio, officiis. dicta officia qui? 
                    Consequatur vitae fuga nihil quod eaque, iste labore molestiae facilis?</p>
            </div>
            <div class="icono">
                <img class="icono" src="build/img/icono2.svg" alt="icono seguridad" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae molestiae aspernatur laborum, aliquid quod nobis! Illum architecto
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo temporibus quos perferendis est mollitia magnam incidunt accusamus 
                    similique nisi, aspernatur deserunt error praesentium itaque saepe dolor quidem adipisci. Distinctio, officiis. dicta officia qui? 
                    Consequatur vitae fuga nihil quod eaque, iste labore molestiae facilis?</p>
            </div>
            <div class="icono">
                <img class="icono" src="build/img/icono3.svg" alt="icono seguridad" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae molestiae aspernatur laborum, aliquid quod nobis! Illum architecto
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo temporibus quos perferendis est mollitia magnam incidunt accusamus 
                    similique nisi, aspernatur deserunt error praesentium itaque saepe dolor quidem adipisci. Distinctio, officiis. dicta officia qui? 
                    Consequatur vitae fuga nihil quod eaque, iste labore molestiae facilis?</p>
            </div>
        </div>
    </main>
    <section class="seccion conteneddor">
        <h2>Casas y depas en venta</h2>
        <?php
            $limite=3;
            include 'includes/templates/anuncios.php';
        ?>

        <div class="alinear-derecha">
            <a href="/bienesraices/anuncios.php" class="boton-verde">Ver todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>LLena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad.</p>
        <a href="contacto.html" class="boton-amarillo" >Contactános</a>
    </section>
    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpeg" type="image/jpeg">
                        <img src="build/img/blog1.jpg" alt="Texto entrada blog" loading="lazy">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2020</span>por: <span>Admin</span></p>
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
                        <p class="informacion-meta" >Escrito el: <span>20/10/2020</span>por: <span>Admin</span></p>
                        <p>    
                            Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores 
                            para darle vida a tu espacio.
                        </p>
                    </a>
                </div>

            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comport de una excelente forma, muy buena atencion y la casa que me ofrecieron cumple con mis expectativas
                </blockquote>
            <p>Rogelio Pérez</p>
            </div>
        </section>
    </div>
  
    <?php 
        incluirTemplate('footer');
    ?>
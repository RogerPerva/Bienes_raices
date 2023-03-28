
<?php
        require 'includes/funciones.php';
        incluirTemplate('header');
   ?>
    
    <main class="contenedor seccion">
        <h1>Conoce sobre nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img src="build/img/nosotros.jpg" alt="sobre nosotros" loading="lazy">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia.
                </blockquote>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias iure voluptate itaque eum maxime, reprehenderit unde ab ex neque fugit dolores
                    nam optio aperiam consequatur eveniet in totam, harum tempore.lore   Lorem ipsum dolor sit amet consectetur adipisiclllllllling elit. Officia, fugit 
                    nemo. Voluptatum sequi quo delectus! Ipsam, temporibus reprehenderit iusto alias numquam dignissimos quia veniam eos atque, pariatur nihil dol
                    oribus veritatis?Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis incidunt natus consequuntur ullam i Debitis officia eligendi i
                    nventore iure quis nostrum sapiente, cupiditate, rem modi iusto adipisci, laudantium libero.is exercitationem quae reestias minima sit. Labore, totam 
                    distinctio, error non porro, placeat quisquam at exercitationem voluptatem quaerat quibusdam quis.s earum nulla voluptate consequatur officia placeat
                     aliquid iusto praesentium neque tenetur porro facilis maxime maiores? Ratione, tempora!
                </p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias iure voluptate itaque eum maxime, reprehenderit unde ab ex neque fugit dolores
                    nam optio aperiam consequatur eveniet in totam, harum tempore.lore   Lorem ipsum dolor sit amet consectetur adipisiclllllllling elit. Officia, fugit 
                    nemo. Voluptatum sequiipisci, laudantium libero.is exercitationem quae reestias minima sit. Labore, totam 
                    distinctio, error non porro, placeat quisquam at exercitationem voluptatem quaerat quibusdam quis.s earum nulla voluptate consequatur officia placeat
                     aliquid iusto praesentium neque tenetur porro facilis maxime maiores? Ratione, tempora!
                </p>
                
            </div>
        </div>
    </main>

    <section class="contenedor seccion">  <!-- iconos-->

        <h1>Más sobre nosotros</h1>
            <div class="iconos-nosotros">
                <div class="icono">
                    <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                    <h3>Seguridad</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae molestiae aspernatur laborum, aliquid quod nobis! Illum architecto
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo temporibus quos perferendis est mollitia magnam incidunt accusamus 
                        similique nisi, aspernatur deserunt error praesentium itaque saepe dolor quidem adipisci. Distinctio, officiis. dicta officia qui? 
                        Consequatur vitae fuga nihil quod eaque, iste labore molestiae facilis?</p>
                </div>
                <div class="icono">
                    <img src="build/img/icono2.svg" alt="icono seguridad" loading="lazy">
                    <h3>Precio</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae molestiae aspernatur laborum, aliquid quod nobis! Illum architecto
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo temporibus quos perferendis est mollitia magnam incidunt accusamus 
                        similique nisi, aspernatur deserunt error praesentium itaque saepe dolor quidem adipisci. Distinctio, officiis. dicta officia qui? 
                        Consequatur vitae fuga nihil quod eaque, iste labore molestiae facilis?</p>
                </div>
                <div class="icono">
                    <img src="build/img/icono3.svg" alt="icono seguridad" loading="lazy">
                    <h3>Tiempo</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae molestiae aspernatur laborum, aliquid quod nobis! Illum architecto
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo temporibus quos perferendis est mollitia magnam incidunt accusamus 
                        similique nisi, aspernatur deserunt error praesentium itaque saepe dolor quidem adipisci. Distinctio, officiis. dicta officia qui? 
                        Consequatur vitae fuga nihil quod eaque, iste labore molestiae facilis?</p>
                </div>
            </div>
        </section> <!-- iconos-->
    
        <?php 
            incluirTemplate('footer');
        ?>
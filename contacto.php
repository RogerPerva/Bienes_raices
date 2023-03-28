
<?php
        require 'includes/funciones.php';
        incluirTemplate('header');
   ?>
    
    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="imga/webp">
            <source srcset="build/img/destacada3.jpg" type="imga/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen contacto">
        </picture>
        <h2> Llena el formulario</h2>

        <form class="formulario">
            <fieldset>
                <legend>Informacion personal</legend>
                
                <label for="nombre">Nombre:</label>
                <input type="text" placeholder="Tu Nombre" id="nombre">
                
                <label for="Email">Email:</label>
                <input type="email" placeholder="Tu email" id="email">
                
                <label for="telefono">Telefono:</label>
                <input type="tel"  id="telefono">
                
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje"></textarea></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>

                <label for="opciones">Vende o compra:</label>
                <select id="opciones">
                    <option value="" disabled selected>--Selecciona--</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o presupuesto:</label>
                <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto">
            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>
                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">
                    <label for="contactar-email">Email</label>
                    <input name="contacto" type="radio" value="email" id="contactar-email">
                </div>

                <p>Si eligio teléfono, elija la fecha y la hora para ser contactado</p>
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha">
                
                <label for="hora">Telefono:</label>
                <input type="time" id="hora" min="09:00" max="18:00">

            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>
    
    <?php 
        incluirTemplate('footer');
    ?>

<?php
    include './includes/funciones.php';
    incluirTemplate('header');
   ?>
    
    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar sesion</h1>

        <form action="" class="formulario">
        <fieldset>
                <legend>Email y password</legend>
                
                <label for="Email">Email:</label>
                <input type="email" placeholder="Tu email" id="email">
                
                <label for="password">Passsword:</label>
                <input type="password" placeholder="Password" id="password">
            </fieldset>

            <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
        </form>
    </main>
    
    <?php 
        incluirTemplate('footer');
    ?>
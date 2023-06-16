
<?php 
require '../../includes/app.php';

use App\Vendedor;

estaAutenticado();

$vendedor = new Vendedor;

$errores = Vendedor::getErrores();

if($_SERVER['REQUEST_METHOD']==='POST'){
    
}

incluirTemplate('header');

?>

<main class="contenedor seccion">
        <h1>Registrar Vendedores</h1>
        <a href="../index.php" class="boton boton-verde"> Volver</a>
        
        <?php            foreach($errores as $error): ?>
            <div class="alerta error">
                <?php        echo $error;          ?>
            </div>
        <?php            endforeach;       ?>
        
    <form class="formulario" method="POST" action="../vendedores/crear.php" enctype="multipart/form-data">

        <?php include FORMULARIO_VENDEDORES; ?>

        <input type="submit" value="Crear Vendedor" class="boton boton-verde" > 
    </form>

    </main>
    
    <?php 
        incluirTemplate('footer');
    ?>
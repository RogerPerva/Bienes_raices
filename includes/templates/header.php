<?php    ini_set('display_errors', 1);
         ini_set('display_startup_errors', 1);
         error_reporting(E_ALL);

         if(!isset($_SESSION)){ //Validamos que no haya o que ya haya una sesion iniciada.
             session_start();   // Si no la hay iniciamos una sesion
            }
           //  var_dump($_SESSION); // Mostramos la sesion que ya esta inciada
            
            $auth = $_SESSION['login'] ?? false;
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes raices</title>
    <link rel="stylesheet" href="/bienesraices/build/css/app.css">
</head>
<body>
<header class="header <?php echo $inicio?'inicio':''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/bienesraices/index.php" class="logo">
                    <img src="/bienesraices/build/img/logo.svg" alt="logotipo de bienes raices" >
                </a>

                <div class="mobile-menu">
                    <img src="/bienesraices/build/img/barras.svg" alt="icono menu responsive">
                </div>
                <div class="derecha">
                <img src="/bienesraices/build/img/dark-mode.svg" alt="dark-mode-boton" class="dark-mode-boton">
                    <nav class="navegacion">
                        <a href="/bienesraices/nosotros.php">Nosotros</a>
                        <a href="/bienesraices/anuncios.php">Anuncio</a>
                        <a href="/bienesraices/blog.php">Blog</a>
                        <a href="/bienesraices/contacto.php">Contacto</a>
                        <?php if($auth): ?>
                            <a href="/bienesraices/cerrar-sesion.php" >Cerrar sesion</a>
                        <?php endif; ?>
                        <?php if(!$auth): ?>
                            <a href="/bienesraices/login.php" >Iniciar sesion</a>
                        <?php endif; ?>
                    </nav>
                </div>
                
            </div> <!--.barra-->
            <?php  echo $inicio?"<h1>Venta de Casas y Departamentos exclusivos de lujo</h1>":'';   ?>
        </div>
    </header>
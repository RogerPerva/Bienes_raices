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
                <a href="index.php" class="logo">
                    <img src="build/img/logo.svg" alt="logotipo de bienes raices" >
                </a>

                <div class="mobile-menu">
                    <img src="build/img/barras.svg" alt="icono menu responsive">
                </div>
                <div class="derecha">
                <img src="build/img/dark-mode.svg" alt="dark-mode-boton" class="dark-mode-boton">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncio</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                    </nav>
                </div>
                
            </div> <!--.barra-->
            <?php  if($inicio){    ?>
                    
                    <h1>Venta de Casas y Departamentos exclusivos de lujo</h1>
            <?php    }   ?>
            
        </div>
    </header>

<?php
        require 'includes/app.php';
        incluirTemplate('header');

        if($_SERVER['REQUEST_METHOD']=== 'GET'){
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT); //validamos que sea un numero
        
        if(is_int($id)){

            
        $db = conectarDB();
        $query="SELECT * FROM propiedades WHERE id = $id";

        $resultado = mysqli_query($db, $query);
           if(!$resultado->num_rows){ // num_rows es parte del objeo que regresa msqli_query, y tiene dos valores, 1 y 0, 1 si tiene info y 0, si no.
               header('Location:/bienesraices/index.php');
           }
        $propiedad = mysqli_fetch_assoc($resultado);
            
        }else{
                header('Location:/bienesraices/index.php');
            
        }
    
    }
       

   ?>
    
    <main class="contenedor seccion contenido-centrado">
        <h1> <?php echo $propiedad['titulo']; ?></h1>
                    <img src="/bienesraices/imagenes/<?php echo $propiedad['imagen'];?>" alt="anuncio" loading="lazy">

        <div class="resumen-propiedad">
            <p class="precio">$ <?php echo $propiedad['precio']; ?> </p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img src="build/img/icono_wc.svg" alt="icono wc" loaging="lazy">
                    <p> <?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loaging="lazy">
                    <p> <?php echo $propiedad['estacionamiento']; ?></p>
                </li>
                <li>
                    <img src="build/img/icono_dormitorio.svg" alt="icono dormitorio" loaging="lazy">
                    <p> <?php echo $propiedad['habitaciones']; ?></p>
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
        mysqli_close($db);
        incluirTemplate('footer');
    ?>
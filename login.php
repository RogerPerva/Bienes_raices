
<?php
    require 'includes/config/database.php';
    $db=conectarDB();

    //Autenticar el usuario

    $errores=[]; //hacemos un arreglo para los errores

    if($_SERVER['REQUEST_METHOD']==='POST'){
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        $email=mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)); //sanitisamos con real_escape y validamos que sea un email
        $password=mysqli_real_escape_string($db,$_POST['password']);//sanitisamos los datos con mysqli_real_escape_string
        if(!$email){
            $errores[]="el email es obligatorio o no es valido";
        }
        if(!$password){
            $errores[]="el password es obligatorio";
        }

        if(empty($errores)){
            //Revisar si el usuario existe.
            $query = "SELECT * FROM usuarios WHERE email = '$email'"; //la consulta que queremos realizar
             $resultado = mysqli_query($db, $query); //Guardamos el resultado en $resultado, y hacemos la consulta madnando los datos de la base y la consulta.

            if($resultado->num_rows){ //Cuando es valida la consulta num_rows sera igual a 1 y cuando no, será igual a 0
               //Revisar si el password es correcto:
                $usuario = mysqli_fetch_assoc($resultado); //Traemos todos los datos del usuario y los almacenamos en 'usuario'
                //Verificar si el password es correcto.
                $auth = password_verify($password, $usuario['password']); //utilizamos la funciond de php para validar y primer argumento es el pass y el segundo el hash.
                echo "<pre>";
                var_dump($auth);
                echo "</pre>";
                if($auth){ //Validamos lo que tenemos almacenado dentro del auxiliar para utenticar
                    //El usuario esta autenticado
                    header('Location: ');
                }else{
                    $errores[]="Contraseña incorrecta";
                }
            }else{
                $errores[]="Usuario no valido";
            }
        }
    }
    
    //incluye el header
    include './includes/funciones.php';
    incluirTemplate('header');
   ?>
    
    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar sesion</h1>
<?php foreach ($errores as $error): ?>
    <div class="alerta error">
        <?php echo $error; ?>
    </div>
    <?php endforeach; ?>
        <form action="" method="POST" class="formulario">
        <fieldset>
                <legend>Email y password</legend>
                
                <label for="Email">Email:</label>
                <input type="email" placeholder="Tu email" name="email" id="email" required>
                
                <label for="password">Passsword:</label>
                <input type="password" placeholder="Password" name="password" id="password" required>
            </fieldset>

            <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
        </form>
    </main>
    
    <?php 
        incluirTemplate('footer');
    ?>
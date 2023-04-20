<?php

//Importar la conexion
    require 'includes/config/database.php';
    $db=conectarDB();
//Crear un email y password.
$email = "corre3@correo.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_DEFAULT); //Hasheamos la contraseña

// echo "<pre>";
// var_dump($passwordHash);
// echo "</pre>";

echo '<br>';

//Query para crear el usuario
$query = "INSERT INTO usuarios (email, password) VALUES ('$email','$passwordHash')";

echo "<pre>";
var_dump($query);
echo "</pre>";

//Agregarlo a la base de datos/realizar la consulta


mysqli_query($db, $query);

<?php

//Importar la conexion
    require 'includes/config/database.php';
    $db=conectarDB();
//Crear un email y password.
$email = "corre2@correo.com";
$password = "1234567";

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

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

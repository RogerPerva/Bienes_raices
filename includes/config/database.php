<?php
function conectarDB() : mysqli{
    $db = mysqli_connect('localhost', 'root', '1102', 'bienesracices_crud');
    ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    // echo $db? "Se conecto":"Error, no se pudo conectar";
    if(!$db){
        echo "se conecto";
        exit;
    }

    return $db;


}

?>
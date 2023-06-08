<?php
session_start(); //Siempre hay que tener iniciada la sesion.

    $_SESSION =[]; //Reescribimos el arreglo de $_SESSION y asi es igual a reiniciar la sesion.

echo "<pre>";
var_dump($_SESSION);
echo "</pre>";

session_destroy();
header('Location: /bienesraices/login.php');
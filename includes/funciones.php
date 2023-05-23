<?php


define('TEMPLATES_URL',__DIR__.'/templates'); //definimos 'TEMPLATES_URL' como --{ __DIR__.'/templates' }-- y en @incluirTemplate
define('FUNCIONES_URL',__DIR__.'funciones.php');


function incluirTemplate(string $nombre, bool $inicio=false){
        include TEMPLATES_URL."/{$nombre}.php";     //TEMPLATES_URL = __DIR__.'/templates' y el nombre del template lo traemos desde donde se manda a llamar la funcion

    }

function estaAutenticado(): bool{ //nos va a retornar un bool
    session_start();
    $auth=$_SESSION['login']; //creamos $auth para almacenar el login

    if($auth){ //si existe el login entonces se queda donde esta
        return true;
    }
        return false;
    
}
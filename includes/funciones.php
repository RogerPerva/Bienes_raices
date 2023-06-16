<?php


define('TEMPLATES_URL',__DIR__.'/templates'); //definimos 'TEMPLATES_URL' como --{ __DIR__.'/templates' }-- y en @incluirTemplate
define('FUNCIONES_URL',__DIR__.'funciones.php');
define('CARPETA_IMAGENES', __DIR__.'/../imagenes/'); //definimos la ubicacion de la carpeta de imagenes
define('FORMULARIO_PROPIEDADES', __DIR__.'/templates/formulario_propiedades.php');
define('FORMULARIO_VENDEDORES', __DIR__.'/templates/formulario_vendedores.php');

function incluirTemplate(string $nombre, bool $inicio=false){
        include TEMPLATES_URL."/{$nombre}.php";     //TEMPLATES_URL = __DIR__.'/templates' y el nombre del template lo traemos desde donde se manda a llamar la funcion

    }

function estaAutenticado(): bool{ //nos va a retornar un bool
    session_start();

    if(!$_SESSION['login']){ //si existe el login entonces se queda donde esta
        header('Location:/bienesraices/index.php');
    }
        return false;
    
}

function debuguear($variable){
    
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";

    exit;
}

//Escapar/sanitizar codigo html

function s($html) : string{ //unicamente retorna string
    $s = htmlspecialchars($html);
    return $s;
}

// Validar tipo de contenido.
function validarTipoContenido($tipo){
    $tipos = ['vendedor', 'propiedad'];

    return in_array($tipo, $tipos);
}
<?php
require 'app.php';
function incluirTemplate(string $nombre, bool $inicio=false){
        include TEMPLATES_URL."/{$nombre}.php";

    }

function estaAutenticado(): bool{ //nos va a retornar un bool
    session_start();
    $auth=$_SESSION['login']; //creamos $auth para almacenar el login

    if($auth){ //si existe el login entonces se queda donde esta
        return true;
    }
        return false;
    
}
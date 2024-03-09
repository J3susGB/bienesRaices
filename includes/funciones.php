<?php

//Función para incluir un template:
require 'app.php';

function incluirTemplate(string $nombre, bool $inicio = false) {
    include TEMPLATES_URL ."/{$nombre}.php";
}

//Función para autenticar usuario
function estaAutenticado():bool {
    session_start();

    $auth = $_SESSION['login'];
    if( $auth ) {
        return true;
    } 
    return false;
}
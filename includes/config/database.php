<?php

function conectarDB() : mysqli {
    $db = mysqli_connect("localhost", "root", "123456", "bienesraices_crud");

    if (!$db) {
        echo "Hubo un problema al conectar con la base de datos";
        exit;
    }

    return $db;
}
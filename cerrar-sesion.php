<?php

session_start();

$_SESSION = []; //Reasignamos el valor de la global a vacío y redireccionamos a inicio

header('Location: /');
<?php

    if( !isset($_SESSION) ) {
        session_start();
    }
    
    $auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bienes Raíces</title>
        <link rel="stylesheet" href="/build/css/app.css">
    </head>
    <body>

        <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
            <div class="contenedor contenido-header">

                <div class="barra">
                    <a href="/">
                        <img src="/build/img/logo.svg" alt="Logotipo de bienes raíces">
                    </a>

                    <div class="mobile-menu">
                        <img src="/build/img/barras.svg" alt="icono menu responsive">
                    </div>

                    <div class="derecha">
                        <img class="dark-mode-boton" src="/build/img/dark-mode.svg">
                        <nav class="navegacion">
                            <a href="nosotros.php">Nosotros</a>
                            <a href="anuncios.php">Anuncios</a>
                            <a href="blog.php">Blog</a>
                            <a href="contacto.php">Contacto</a>
                            <?php if(!$auth) : ?>
                                <a href="login.php">Iniciar sesión</a>
                            <?php endif; ?>
                            <?php if($auth) : ?>
                                <a href="/admin/index.php">Administrador</a>
                            <?php endif; ?>
                            <?php if($auth) : ?>
                                <a href="cerrar-sesion.php">Cerrar sesión</a>
                            <?php endif; ?>
                        </nav>
                    </div>
                    
                </div> <!--Cierre .barra-->

                <?php if($inicio) { ?>
                    <h1>Venta de casas y departamentos exclusivos de lujo</h1>
                <?php } ?>

            </div>
        </header>

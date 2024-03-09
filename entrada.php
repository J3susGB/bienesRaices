<?php

    require 'includes/funciones.php';

    incluirTemplate('header');
?>

        <main class="contenedor seccion contenido-centrado">
            <h1>Guía para la decoración de tu hogar</h1>

            <picture>
                <source srcset="build/img/destacada2.webp" type="image/webp">
                <source srcset="build/img/destacada2.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/destacada2.jpg" alt="Guía de decoración de tu hogar">
            </picture>

            <p class="informacion-meta">Escrito el: <span>20/10/2023</span> por: <span>Admin</span></p>

            <div class="resumen-propiedad">

                <p>
                    Integer fringilla, tellus non pellentesque sodales, sem libero ornare lorem, quis maximus lacus eros 
                    vel orci. Etiam semper elit non turpis euismod sollicitudin. Suspendisse interdum orci eros, id molestie 
                    metus vulputate id. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia 
                    curae; Suspendisse eleifend ipsum non neque varius, sed suscipit turpis condimentum. Donec molestie 
                    augue vel magna suscipit, sit amet efficitur purus lacinia. Pellentesque a ex vehicula, tincidunt metus 
                    eget, tempus leo. Phasellus sed finibus tortor. Morbi at lacus dui. Proin pellentesque volutpat sem, a 
                    fringilla ipsum rutrum et. Donec ultricies sed diam rutrum maximus.
                </p>
                
                <p>
                    augue vel magna suscipit, sit amet efficitur purus lacinia. Pellentesque a ex vehicula, tincidunt metus 
                    eget, tempus leo. Phasellus sed finibus tortor. Morbi at lacus dui. Proin pellentesque volutpat sem, a 
                    fringilla ipsum rutrum et. Donec ultricies sed diam rutrum maximus. Proin pellentesque volutpat sem, a 
                    fringilla ipsum rutrum et. Donec ultricies sed.
                </p>
            </div>
        </main>

<?php
    incluirTemplate('footer');
?>
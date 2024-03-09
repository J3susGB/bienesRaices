<?php

    require 'includes/funciones.php';

    incluirTemplate('header');
?>

        <main class="contenedor seccion">
            <h1>Sobre nosotros</h1>

            <div class="contenido-nosotros">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/nosotros.webp" type="image/webp">
                        <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/nosotros.jpg" alt="nosotros">
                    </picture>
                </div>

                <div class="texto-nosotros">
                    <blockquote>
                        25 años de experiencia
                    </blockquote>

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
            </div>
        </main>

        <section class="contenedor seccion">
            <h1>Más sobre nosotros</h1>

            <div class="iconos-nosotros">
                <div class="icono">
                    <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                    <h3>Seguridad</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tincidunt interdum tortor, 
                        in faucibus nisl. Cras sed lectus sit amet felis porttitor mollis. Praesent augue eros, semper 
                        tristique bibendum vel.
                    </p>
                </div>

                <div class="icono">
                    <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                    <h3>Precio</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tincidunt interdum tortor, 
                        in faucibus nisl. Cras sed lectus sit amet felis porttitor mollis. Praesent augue eros, semper 
                        tristique bibendum vel.
                    </p>
                </div>

                <div class="icono">
                    <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
                    <h3>A tiempo</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tincidunt interdum tortor, 
                        in faucibus nisl. Cras sed lectus sit amet felis porttitor mollis. Praesent augue eros, semper 
                        tristique bibendum vel.
                    </p>
                </div>
            </div>

        </section>

<?php
    incluirTemplate('footer');
?>
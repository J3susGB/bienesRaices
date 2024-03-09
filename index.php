<?php

    require 'includes/funciones.php';

    incluirTemplate('header', $inicio = true);
?>

        <main class="contenedor seccion">
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

        </main>

        <section class="seccion contenedor">
            <h2>Casas y departamentos en venta</h2>

            <?php
                $limite = 3;
                include "includes/templates/anuncios.php";
            ?>

            <div class="alinear-derecha">
                <a href="anuncios.php" class="boton-verde">Ver todas</a>
            </div>
        </section>

        <section class="imagen-contacto">
            <h2>Encuentra la casa de tus sueños</h2>
            <p>Rellena el formulario de contacto y un asesor se pondrá en contacto contigo</p>

            <a href="contacto.html" class="boton-amarillo">Contáctanos</a>
        </section>

        <div class="contenedor seccion seccion-inferior">
            <section class="blog">
                <h3>Nuestro blog</h3>
                <article class="entrada-blog">
                    <div class="imagen">
                        <picture>
                            <source srcset="build/img/blog1.webp" type="image/webp">
                            <source srcset="build/img/blog1.jpg" type="image/jpeg">
                            <img loading="lazy" src="build/img/blog1.jpg" alt="Primera entrada de blog">
                        </picture>
                    </div>
                    <div class="texto-entrada">
                        <a href="entrada.html">
                            <h4>Terraza en el techo de tu casa</h4>
                            <p class="informacion-meta">Escrito el: <span>20/10/2023</span> por: <span>Admin</span></p>

                            <p>
                                Consejos para construir una terraza en el techo de tu casa con los mejores materiales
                                y ahorrando dinero
                            </p>
                        </a>
                    </div>
                </article>

                <article class="entrada-blog">
                    <div class="imagen">
                        <picture>
                            <source srcset="build/img/blog2.webp" type="image/webp">
                            <source srcset="build/img/blog2.jpg" type="image/jpeg">
                            <img loading="lazy" src="build/img/blog2.jpg" alt="Segunda entrada de blog">
                        </picture>
                    </div>
                    <div class="texto-entrada">
                        <a href="entrada.html">
                            <h4>Guía para la decoración de tu hogar</h4>
                            <p class="informacion-meta">Escrito el: <span>20/10/2023</span> por: <span>Admin</span></p>

                            <p>
                                Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores
                                para darle vida a tu espacio
                            </p>
                        </a>
                    </div>
                </article>
            </section>

            <section class="testimoniales">
                <h3>Opiniones</h3>

                <div class="testimonial">
                    <blockquote>
                        El personal se comportó de una manera excelente, con muy buena atención y la casa que me ofrecieron
                        cumple con todas mis espectativas
                    </blockquote>
                    <p>- Sofía Velázquez</p>
                </div>
            </section>
        </div>

<?php
    incluirTemplate('footer');
?>
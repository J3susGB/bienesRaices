<?php

    require 'includes/funciones.php';

    incluirTemplate('header');
?>

        <main class="contenedor seccion">
            <h1>Contacto</h1>

            <picture>
                <source srcset="build/img/destacada3.webp" type="image/webp">
                <source srcset="build/img/destacada3.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen de contacto">
            </picture>

            <h2>Rellene el formulario de contacto</h2>

            <form class="formulario">

                <fieldset>
                    <legend>Información personal</legend>

                    <label for="nombre">Nombre</label>
                    <input type="text" placeholder="Escribe tu nombre" id="nombre">

                    <label for="email">E-mail</label>
                    <input type="email" placeholder="Escribe tu email" id="email">

                    <label for="telefono">Teléfono</label>
                    <input type="tel" placeholder="Escribe tu teléfono" id="telefono">

                    <label for="mensaje">Mensaje</label>
                    <textarea id="mensaje"></textarea>
                </fieldset>

                <fieldset>
                    <legend>Información sobre la propiedad</legend>

                    <label for="opciones">Vende/Compra</label>
                    <select id="opciones">
                        <option value="" disabled selected>-- Seleccione --</option>
                        <option value="Compra">Compra</option>
                        <option value="Vende">Vende</option>
                    </select>

                    <label for="presupuesto">Precio/Presupuesto</label>
                    <input type="number" placeholder="Escribe tu precio/presupuesto" id="presupuesto">
                </fieldset>

                <fieldset>
                    <legend>Contacto</legend>

                    <p>Como desea ser contactado</p>
                    
                    <div class="forma-contacto">
                        <label for="contactar-telefono">Teléfono</label>
                        <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                        <label for="contactar-email">E-mail</label>
                        <input name="contacto" type="radio" value="email" id="contactar-email">
                    </div>

                    <p>Si elegió la opción teléfono, elija la fecha y la hora para ser contactado</p>

                    <label for="fecha">Fecha</label>
                    <input type="date" id="fecha">

                    <label for="hora">Hora</label>
                    <input type="time" min="09:00" max="18:00" id="hora">
                </fieldset>

                <input type="submit" value="Enviar" class="boton-verde">

            </form>
        </main>

<?php
    incluirTemplate('footer');
?>

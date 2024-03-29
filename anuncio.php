<?php

    //validar el id
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    //Si no existe un id, redireccionamos al usuario a la página principal
    if (!$id) {
        header('Location: /');
    }

    //Importar la base de datos
    require 'includes/config/database.php'; //La ruta es relativa al archivo index, ya que se llama desde ahí
    $db = conectarDB();

    //Consultar
    $query = " SELECT * FROM propiedades WHERE id = {$id} ";

    //Obtener resultado
    $resultado = mysqli_query($db, $query);

    if ( !$resultado -> num_rows ) {  //Si el usuario pone en el navegador un id que no existe, redireccionará a página principal
        header('Location: /');
    }

    $propiedad = mysqli_fetch_assoc($resultado);

    require 'includes/funciones.php';

    incluirTemplate('header');
?>

        <main class="contenedor seccion contenido-centrado">
            <h1> <?php echo $propiedad['titulo']; ?> </h1>

            <img loading="lazy" src=" /imagenes/<?php echo $propiedad['imagen']; ?> " alt="Imagen de la propiedad">
       

            <div class="resumen-propiedad">
                <p class="precio"> <?php echo $propiedad['precio']; ?> €</p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p> <?php echo $propiedad['wc']; ?> </p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono aparcamiento">
                        <p> <?php echo $propiedad['estacionamiento']; ?> </p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                        <p> <?php echo $propiedad['habitaciones']; ?> </p>
                    </li>
                </ul>

                <p> <?php echo $propiedad['descripcion']; ?> </p>

            </div>
        </main>

<?php

    mysqli_close($db);

    incluirTemplate('footer');

?>
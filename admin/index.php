<?php

    require '../includes/funciones.php';
    $auth = estaAutenticado();

    if( !$auth ) {
        header( 'Location: /' );
    }

    //Importar la conexión a la base de datos
    require '../includes/config/database.php';
    $db = conectarDB();

    //Escribir el Query
    $query = "SELECT * FROM propiedades";

    //Consultar la DB
    $resultadoConsulta = mysqli_query($db, $query);


    //Muestra mensaje condicional
    $resultado = $_GET['resultado'] ??null;

    //Se hace consulta al método post del boton eliminar:
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id) {

            //Elimina el archivo
            $queryArchivo = " SELECT imagen FROM propiedades WHERE id = {$id} ";
            $resultadoArchivo = mysqli_query($db,  $queryArchivo);
            $propiedad = mysqli_fetch_assoc($resultadoArchivo);

            unlink('../imagenes/' . $propiedad['imagen']);

            //Elimina la propiedad
            $queryDelete = " DELETE FROM propiedades WHERE id = {$id} ";
            $resultadoDelete = mysqli_query($db,  $queryDelete);

            if($resultadoDelete) {
                header('Location: /admin?resultado=3');
            }
        }
    }

    //Incluye un template
    incluirTemplate('header');
?>

        <main class="contenedor seccion">
            <h1>Administrador de Bienes Raíces</h1>

            <?php if( intval($resultado) ===1) /*intval transforma el string que devuelve en entero*/ : ?>  
                <p class="alerta exito">Anuncio creado correctamente</p>
            <?php elseif( intval($resultado) ===2) : ?>  
                <p class="alerta exito">Anuncio actualizado correctamente</p>
            <?php elseif( intval($resultado) ===3) : ?>  
            <p class="alerta exito">Anuncio eliminado correctamente</p>
            <?php endif; ?>

            <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>

            <table class="propiedades">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Imagen</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody> <!--Mostrar los resultados de la consulta a base de datos-->
                    <?php while( $propiedad = mysqli_fetch_assoc($resultadoConsulta) ) : ?>
                    <tr class="formulario-admin">
                        <td><?php echo $propiedad['id']; ?></td>
                        <td><?php echo $propiedad['titulo']; ?></td>
                        <td> <img src="/imagenes/<?php echo $propiedad['imagen']; ?>" class="imagen-tabla"> </td>
                        <td><?php echo $propiedad['precio']; ?>€</td>
                        <td>
                            <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                            
                            <form method="POST" class="w-100">
                                <!--Se crea input tipo hidden (oculto)-->
                                <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
                                <input type="submit" value="Eliminar" class="boton-rojo-block">
                            </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </main>

<?php

    //Cerrar conexión a base de datos (opcinal pero recomendable)
    mysqli_close($db);

    incluirTemplate('footer');
?>
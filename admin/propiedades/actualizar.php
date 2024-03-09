<?php

    require '../../includes/funciones.php';
    $auth = estaAutenticado();

    if( !$auth ) {
        header( 'Location: /' );
    }

    //Validar la URL por ID válido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    if( !$id ) {
        header('Location: /admin');
    }

    //Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    //Consulta para obtener los datos de la propiedad
    $consulta2 = "SELECT * FROM propiedades WHERE id  = {$id}";
    $resultadoC2 = mysqli_query($db, $consulta2);
    $propiedad = mysqli_fetch_assoc($resultadoC2);

    //Consultar paras obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    // Arreglo con mensajes de errores
    $errores =[];

    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedorId = $propiedad['vendedores_id'];
    $imagenPropiedad = $propiedad['imagen'];

    //Ejecutar el código después de que el usuario envía el formulario
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {

        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";

        // exit;

        $titulo = mysqli_real_escape_string($db,  $_POST['titulo']);
        $precio = mysqli_real_escape_string($db,  $_POST['precio']);
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
        $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
        $creado = date("Y/m/d");

        //Asignar files hacia una variable (para imágenes)
        $imagen = $_FILES['imagen'];

        if(!$titulo) {
            $errores[] = "Debes añadir un título";
        }

        if(!$precio) {
            $errores[] = "Debes añadir un precio";
        }

        //Validar imagen por tamaño (1 MB maximo) (Tener en cuenta que el servidor registra el tamaño en bytes, por lo que
        //habrá que transformarlo)
        $medida = 1000 *1000; //Esto devolverá el tamaño máximo que queremos de imagen en bytes

        if($imagen['size'] > $medida) {
            $errores[] = "La imagen es demasiado grande (no puede ser mayor a 100kb)";
        }

        if(strlen($descripcion) < 50) {
            $errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
        }

        if(!$habitaciones) {
            $errores[] = "Debes añadir el número de habitaciones";
        }

        if(!$wc) {
            $errores[] = "Debes añadir el número de baños";
        }

        if(!$estacionamiento) {
            $errores[] = "Debes añadir el número de aparcamientos";
        }

        if(!$vendedorId) {
            $errores[] = "Debes elegir un vendedor";
        }

        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";

        // exit;

        //Revisar si el arreglo de errores está vacío. Si es así, ejecutará la query, si no no
        if (empty($errores)) {

            /** SUBIDA DE ARCHIVOS **/
            //Crear carpeta en servidor:
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)) {  //La función is_dir() retorna si una carpeta existe o no existe
                mkdir($carpetaImagenes);
            }

            //Comprobar si se ha subido una imagen nueva, para borrar la anterior:

            $nombreImagen ='';

            if ($imagen['name']) { //Comprueba si se está subiendo una imagen nueva

                //Eliminar imagen anterior
                unlink($carpetaImagenes . $propiedad['imagen']);

                //Generar nombre aleatorio único a cada imagen que se suba:
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

                //Subir imagen:
                 move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen ); //La función move_uploaded_file guarda la imagen en el servidor, donde le digamos en parámetros

            } else {
                $nombreImagen = $propiedad['imagen'];
            }


            //Insertar en la base de datos
            $query = " UPDATE propiedades SET  titulo = '{$titulo}', precio = {$precio}, imagen = '{$nombreImagen}', descripcion = '{$descripcion}', 
            habitaciones = {$habitaciones}, wc = {$wc}, estacionamiento = {$estacionamiento}, vendedores_id = {$vendedorId}
            WHERE id = {$id} ";

            // echo $query;

            $resultado = mysqli_query($db, $query);

            if (!$resultado) {
                echo "Error en la consulta: " . mysqli_error($db);
            } else {
                echo "Insertado correctamente";
                // Redirigir de vuelta a la página anterior
                header("Location: /admin?resultado=2");
                exit;
            }
        }
    }

    
    incluirTemplate('header');
?>

        <main class="contenedor seccion">
            <h1>Actualizar propiedad</h1>

            <a href="/admin" class="boton boton-verde">Volver</a>

            <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>   
            <?php endforeach; ?>

            <form class="formulario" method="POST" enctype="multipart/form-data">

                <fieldset>
                    <legend>Información general</legend>

                    <label for="titulo">Titulo</label>
                    <input 
                        type="text" 
                        id="titulo" 
                        name="titulo" 
                        placeholder="Titulo de la propiedad" 
                        value="<?php echo $titulo; ?>">

                    <label for="precio">Precio</label>
                    <input 
                        type="number" 
                        id="precio" 
                        name="precio" 
                        placeholder="Precio de la propiedad" 
                        value="<?php echo $precio; ?>">

                    <label for="imagen">Imagen</label>
                    <input 
                        type="file" 
                        id="imagen" 
                        accept="image/jpeg, image/png" name="imagen">

                        <img src="/imagenes/<?php echo $imagenPropiedad; ?>" class="imagen-small">

                    <label for="descripcion">Descipción</label>
                    <textarea 
                        id="descripcion" 
                        name="descripcion"><?php echo $descripcion; ?>
                    </textarea>
                </fieldset>

                <fieldset>
                    <legend>Información de la propiedad</legend>

                    <label for="habitaciones">Habitaciones</label>
                    <input 
                        type="number" 
                        id="habitaciones" 
                        name="habitaciones" 
                        min="1" 
                        placeholder="Número de habitaciones"
                        value="<?php echo $habitaciones; ?>">

                    <label for="wc">Baños</label>
                    <input 
                        type="number" 
                        id="wc" 
                        min="1" 
                        name="wc" 
                        placeholder="Número de baños" 
                        value="<?php echo $wc; ?>">

                    <label for="estacionamiento">Aparcamientos</label>
                    <input 
                        type="number" 
                        id="estacionamiento" 
                        name="estacionamiento" 
                        min="1" 
                        placeholder="Número de aparcamientos"
                        value="<?php echo $estacionamiento; ?>">
                </fieldset>

                <fieldset>
                    <legend>Vendedor</legend>
                    
                    <select name="vendedor">
                        <option value="" >-- Seleccione --</option>

                        <?php while($vendedor = mysqli_fetch_assoc($resultado)) : ?> 
                            <option  <?php echo $vendedorId === $vendedor["id"] ? "selected" : ""; ?>   value=" <?php echo $vendedor['id'] ?> "> <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?> </option>
                        <?php endwhile; ?>
                    </select>
                </fieldset>

                <input type="submit" value="Actualizar propiedad propiedad" class="boton boton-verde">

            </form>

        </main>

<?php
    incluirTemplate('footer');
?>
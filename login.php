<?php

    //Importar la base de datos
    require 'includes/config/database.php';
    $db = conectarDB();

    //Se crea array vacío para registrar errores
    $errores = [];

    //Autenticar el usuario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo"<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        $email = mysqli_real_escape_string($db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL) );
        $password = mysqli_real_escape_string( $db, $_POST['password'] );

        if( !$email ) {
            $errores[] = "Introduce un email válido";
        }

        if( !$password ) {
            $errores[] = "El campo password no puede estar vacío";
        }

        if( empty($errores) ) { //Comprueba si errores está vacío, es decir, si se introduce un mail y password correcto

            //Revisar si el usuario existe
            $query = " SELECT * FROM usuarios WHERE email = '{$email}'; ";
            $resultado = mysqli_query($db, $query);

            if( $resultado -> num_rows ) { //num_rows devolverá 1 si el usuario existe y 0 si no existe

                //Revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);

                //Verificar si el password es correcto
                $auth = password_verify($password, $usuario['password']);
                
                if( $auth ) {
                    //Usuario autenticado
                    session_start();

                    //Llenar el arreglo de la sesion
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;


                    header('Location: /admin');

                } else {
                    $errores[] = " password incorrecto ";
                }

            } else {
                $errores[] = "El usuario no existe";
            }
        }
    }

    //Incluye el header
    require 'includes/funciones.php';

    incluirTemplate('header');
?>

        <main class="contenedor seccion contenido-centrado">
            <h1>Iniciar sesión</h1>

            <?php foreach( $errores as $error ) : ?>
                <div class="alerta error">
                <?php echo $error; ?>
                </div>

            <?php endforeach; ?>

            <form class="formulario" method="POST" novalidate>
                <fieldset>
                    <legend>Email y Password</legend>

                    <label for="email">E-mail</label>
                    <input type="email" placeholder="Escribe tu email" id="email" name="email" required>

                    <label for="password">Password</label>
                    <input type="password" placeholder="Escribe tu password" id="password" name="password"required>
                </fieldset>

                <input type="submit" value="Iniciar sesión" class="boton boton-verde">
            </form>
        </main>

<?php
    incluirTemplate('footer');
?>

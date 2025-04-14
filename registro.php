<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="imagenes/avioncito1.png">
        <link rel="stylesheet" href="styles2.css">
        <title>Registrar usuario ¡Vuela con nosotros!</title>
    </head>

    <body>
        <form name="Registro usuario" method="post">   
            <div class="form-container">    
                <div>
                    <label for="nombre">Ingresa tu nombre</label>
                    <input name="nombre" type="text" placeholder="Nombre">
                </div>
                <div>
                    <label for="email">Ingresa tu correo electrónico</label>
                    <input name="email" type="email" placeholder="Correo electrónico">
                </div>
                <div>
                    <label for="contraseña">Ingresa tu contraseña</label>
                    <input name="contraseña" type="password" maxlength="8" placeholder="Máximo 8 dígitos">

                </div>
                <div id="botones">
                <input type="submit" name="registro">
                <button type="reset">Reset</button> <button><a href="acceso.php">Iniciar sesión</button></a>
                </div>
            </div>
        </form>  

        <?php
            include("registrar.php");
        ?>
    </body>
</html>
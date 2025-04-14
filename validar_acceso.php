<?php
include("con_db.php"); 


if (isset($_POST['ingreso'])) {


    if (!empty($_POST['email']) && !empty($_POST['contraseña'])) {

        $email = trim($_POST['email']);
        $contraseña = trim($_POST['contraseña']);


        $consulta = "SELECT * FROM datos_usuario WHERE email='$email' AND contraseña='$contraseña'";
        $resultado = mysqli_query($conex, $consulta);


        if (mysqli_num_rows($resultado) > 0) {

            ?> <h3 class="ok">¡Acceso concedido!</h3> <?php
            header("Location:busqueda_Viajes.php");

        } else {
            ?> <h3 class="bad">¡Datos incorrectos! ¡Regístrate!</h3> <?php
        }

    } else {
        ?> <h3 class="bad">¡Por favor, completa todos los campos!</h3> <?php
    }
}
?>
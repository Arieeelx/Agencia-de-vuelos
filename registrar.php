<?php

    include("con_db.php");

    if (isset($_POST['registro'])) {
        if  (strlen($_POST['nombre']) >= 1 && strlen($_POST['email']) >= 1) {
            $nombre = trim($_POST['nombre']);
            $email = trim($_POST['email']);
            $contraseña = trim($_POST['contraseña']);
            $fecha_reg = date("d/m/y");

            $consulta = "INSERT INTO datos_usuario(nombre, email, contraseña, fecha_reg) VALUES ('$nombre','$email','$contraseña','$fecha_reg')";

            $resultado = mysqli_query($conex,$consulta);
            
            if ($resultado) {
                ?>
                <h3 class="ok"> ¡Te has registrado con éxito! </h3>
                <?php
            } else {
                ?>
                <h3 class="bad"> ¡Ha ocurrido un error! </h3>
                <?php                    
            }
        } else {
            ?>
            <h3 class="bad"> ¡Por favor, completa los datos! </h3>
            <?php
        }
    }
?>
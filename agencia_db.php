<?php

    $conex = mysqli_connect("localhost","root","","agencia");

    if (!$conex) {
        die("Fallo de conexión: " . mysqli_connect_error());
       }
       echo "Conexión exitosa<br>";
       mysqli_close($conex);

?>
<?php
include("agencia_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $ubicacion = trim($_POST["ubicacion"]);
    $habitaciones = intval($_POST["habitaciones"]);
    $tarifa = floatval($_POST["tarifa"]);

    if (empty($nombre) || empty($ubicacion) || $habitaciones <= 0 || $tarifa <= 0) {
        die("Error: Datos inválidos.");
    }

    $sql = "INSERT INTO hotel (nombre, ubicacion, habitaciones_disponibles, tarifa_noche) 
            VALUES ('$nombre', '$ubicacion', $habitaciones, $tarifa)";

    $conex = mysqli_connect("localhost", "root", "", "agencia");

    if (!$conex) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    if (mysqli_query($conex, $sql)) {
        echo  "Hotel registrado correctamente.";
        header("location: puente2.html");
    } else {
        echo "Error: " . mysqli_error($conex);
    }

    mysqli_close($conex);
}
?>
<?php
include("agencia_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origen = trim($_POST["origen"]);
    $destino = trim($_POST["destino"]);
    $fecha = $_POST["fecha"];
    $plazas = intval($_POST["plazas"]);
    $precio = floatval($_POST["precio"]);

    if (empty($origen) || empty($destino) || empty($fecha) || $plazas <= 0 || $precio <= 0) {
        die("Error: Datos inválidos.");
    }

    $sql = "INSERT INTO vuelo (origen, destino, fecha, plazas_disponibles, precio) 
            VALUES ('$origen', '$destino', '$fecha', $plazas, $precio)";

    $conex = mysqli_connect("localhost", "root", "", "agencia");
    
    if (!$conex) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    if (mysqli_query($conex, $sql)) {
        echo "Vuelo registrado correctamente.";
        header ("location: puente2.html");
    } else {
        echo "Error: " . mysqli_error($conex);
    }

    mysqli_close($conex);
}
?>
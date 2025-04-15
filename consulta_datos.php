<?php
include("agencia_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente = intval($_POST["id_cliente"]);
    $fecha_reserva = $_POST["fecha_reserva"];
    $id_vuelo = intval($_POST["id_vuelo"]);
    $id_hotel = intval($_POST["id_hotel"]);


    if ($id_cliente <= 0 || empty($fecha_reserva) || $id_vuelo <= 0 || $id_hotel <= 0) {
        die("Error: Datos inválidos.");
    }


    $conex = mysqli_connect("localhost", "root", "", "agencia");

    if (!$conex) {
        die("Error de conexión: " . mysqli_connect_error());
    }


    $sql = "INSERT INTO RESERVA (id_cliente, fecha_reserva, id_vuelo, id_hotel) 
            VALUES ($id_cliente, '$fecha_reserva', $id_vuelo, $id_hotel)";

    if (mysqli_query($conex, $sql)) {
        echo "Reserva registrada correctamente.";
        header("refresh:2; url=index.php"); 
    } else {
        echo "Error: " . mysqli_error($conex);
    }

    mysqli_close($conex);
}
?>

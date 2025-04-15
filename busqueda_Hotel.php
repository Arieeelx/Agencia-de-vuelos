<?php
// Conexión a la base de datos (ajusta con tus datos)
$conexion = mysqli_connect("localhost", "root", "", "agencia");

// Verifica si se conectó bien
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verifica si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreHotel = $_POST["hotel"];

    // Consulta básica para buscar hoteles por nombre
    $consulta = "SELECT * FROM hotel WHERE nombre LIKE '%$nombreHotel%'";
    $resultado = mysqli_query($conexion, $consulta);
}

if (isset($resultado) && mysqli_num_rows($resultado) > 0) {
    echo "<h3>Hoteles encontrados:</h3>";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<p>
                🏨 Hotel: " . $fila["nombre"] . " - " . "📍" . $fila["ubicacion"] . " - 💸$" . $fila["tarifa_noche"] . " por noche
                <br><button><a href='agregar.php?id_hotel=" . $fila['id_hotel'] . "'>Agregar al carrito</a></button>
                <br>
              </p>";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="imagenes/avioncito1.png">
        <link rel="stylesheet" href="styles3.css">
        <title>Búsqueda de hoteles</title>
    </head>
    <body>
        <div id="formu">
            <fieldset>
                <legend>🏨Búsqueda de Hoteles🏨</legend>

                <form method="post">
                    <br>
                    <div id="hotel">
                        <input type="text" name="hotel" placeholder="Nombre del hotel">
                    </div>

                    <div id="desd">
                        <input type="date" name="fecha">
                    </div>

                    <div id="Días">
                        <input type="number" name="dias" min="1" max="30" placeholder="Días">
                    </div>
                    <br>
                    <div id="buscador">
                        <input type="submit" value="Buscar">
                        <a href="carrito.php"><input type="button" value="Carrito"></a>
                    </div>
                    <br>
                    <button><a href="busqueda_Vuelos.php">Buscar vuelos</a></button>
                    <button><a href="busqueda_Viajes.php">Buscar paquetes</a></button>
                    <br>
                    <br>
                    <button><a href="acceso.php">Cerrar Sesión</a></button>
                </form>

        </div>
    </body>
</html>
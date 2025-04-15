<?php
session_start();

if (empty($_SESSION['carrito'])) {

    echo "El carrito está vacío";

} else {
    echo "<h3>Tu carrito:</h3>";
    foreach ($_SESSION['carrito'] as $id => $producto) {
        echo "<p>";
    
        if (isset($producto['nombre'])) {

            echo "Nombre: " . $producto['nombre'] . "<br>";
        } elseif (isset($producto['origen']) && isset($producto['destino'])) {

            echo "Vuelo: " . $producto['origen'] . " → " . $producto['destino'] . "<br>";
        }
    
        echo "Cantidad: " . $producto['cantidad'] . "<br>";
        echo "Precio unitario: $" . $producto['precio'] . "<br>";
        echo "<a href='eliminar_prod.php?id=$id'>Eliminar</a><br><br>";
    
        echo "</p>";
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
    <title>Carrito de compras</title>
</head>
<body>
    <div>
        <a href="busqueda_Viajes.php"><input type="button" value="Volver a la búsqueda"></a>
        <input type="button" value="Ir a pagar">
    </div>
</body>
</html>
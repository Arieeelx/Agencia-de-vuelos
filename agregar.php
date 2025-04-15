<?php
session_start();

include_once('archivo_productos.php');

if (isset($_GET['id_paquete'])) {

    $id_paquete = $_GET['id_paquete'];

    $paquete = null;
    
    foreach ($paquetes as $producto) {
        if ($producto['id'] == $id_paquete) {
            $paquete = $producto;
            break;
        }
    }


    if ($paquete) {
        if (isset($_SESSION['carrito'][$id_paquete])) {

            $_SESSION['carrito'][$id_paquete]['cantidad']++;

        } else {

            $_SESSION['carrito'][$id_paquete] = [
                'nombre' => $paquete['nombre'],
                'cantidad' => 1,
                'precio' => $paquete['Precio']
            ];
        }
    }
}

$conexion = mysqli_connect("localhost", "root", "", "agencia");

// Verifica si se conectó bien
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verifica si se envió el id del hotel a través de GET
if (isset($_GET['id_hotel'])) {

    $id_hotel = $_GET['id_hotel'];

    // Consulta para obtener los detalles del hotel
    $consulta = "SELECT * FROM hotel WHERE id_hotel = $id_hotel";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        // Si se encuentra el hotel, obtenemos la información
        $hotel = mysqli_fetch_assoc($resultado);

        // Si el hotel ya está en el carrito, aumentamos la cantidad
        if (isset($_SESSION['carrito'][$id_hotel])) {
            $_SESSION['carrito'][$id_hotel]['cantidad']++;
        } else {
            // Si no está en el carrito, lo agregamos con la cantidad 1
            $_SESSION['carrito'][$id_hotel] = [
                'nombre' => $hotel['nombre'],
                'cantidad' => 1,
                'precio' => $hotel['tarifa_noche']
            ];
        }
    } else {
        // Si no se encuentra el hotel, podemos mostrar un mensaje de error
        echo "Hotel no encontrado.";
    }
}


header('Location: puente.html');

?>
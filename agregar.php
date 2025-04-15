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


if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}


    if (isset($_GET['id_hotel'])) {

        $id_hotel = $_GET['id_hotel'];


        $consulta = "SELECT * FROM hotel WHERE id_hotel = $id_hotel";
        $resultado = mysqli_query($conexion, $consulta);

        if (mysqli_num_rows($resultado) > 0) {

            $hotel = mysqli_fetch_assoc($resultado);

    
            if (isset($_SESSION['carrito'][$id_hotel])) {
                $_SESSION['carrito'][$id_hotel]['cantidad']++;
            } else {
    
                $_SESSION['carrito'][$id_hotel] = [
                    'nombre' => $hotel['nombre'],
                    'cantidad' => 1,
                    'precio' => $hotel['tarifa_noche']
                ];
            }
        } else {

            echo "Hotel no encontrado.";
        }
    }

if (isset($_GET['id_vuelo'])) {

    $id_vuelo = $_GET['id_vuelo'];


    $consulta = "SELECT * FROM vuelo WHERE id_vuelo = $id_vuelo";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {

        $vuelo = mysqli_fetch_assoc($resultado);

 
        if (isset($_SESSION['carrito'][$id_vuelo])) {
            $_SESSION['carrito'][$id_vuelo]['cantidad']++;
        } else {
  
            $_SESSION['carrito'][$id_vuelo] = [
                'origen' => $vuelo['origen'],
                'destino' => $vuelo['destino'],
                'cantidad' => 1,
                'precio' => $vuelo['precio']
            ];
        }
    } else {

        echo "Vuelo no encontrado.";
    }
}

header('Location: puente.html');

?>
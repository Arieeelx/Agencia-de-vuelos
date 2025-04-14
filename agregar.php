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

header('Location: puente.html');

?>
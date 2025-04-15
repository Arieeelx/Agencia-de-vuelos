<?php
session_start();

if (isset($_GET['id'])) {

    $productoId = $_GET['id'];

    unset($_SESSION['carrito'][$productoId]);
}

if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];


    if (isset($_SESSION['carrito'][$id_producto])) {

        unset($_SESSION['carrito'][$id_producto]);
        echo "Producto eliminado con éxito.";
    } else {
        echo "El producto no está en el carrito.";
    }
} else {
    echo "No se ha recibido un ID válido.";
}

header('Location: carrito.php');
?>
<?php

ini_set('session.gc_maxlifetime',300);

session_start();

session_id();
session_regenerate_id();

include_once("alerta.php");
include_once("archivo_Productos.php");

alertaOferta("Nuevas ofertas disponibles en este fin de semana, ¡Aprovecha!");



class viaje {

    public $id;
    public $nombreHotel;
    public $ciudad;
    public $pais;
    public $fechaViaje;
    public $duracionViaje;

    public function mostrarDetalles() {
        return "🏨 Hotel: {$this->nombreHotel} - 📍 {$this->ciudad}, {$this->pais} - 📅 {$this->fechaViaje} - ⏳ {$this->duracionViaje} días";
    }

    public function __construct($id, $nombreHotel, $ciudad, $pais, $fechaViaje, $duracionViaje) {
        $this->id = $id;
        $this->nombreHotel = $nombreHotel;
        $this->ciudad = $ciudad;
        $this->pais = $pais;
        $this->fechaViaje = $fechaViaje;
        $this->duracionViaje = $duracionViaje;
    }

    public static function busquedaViajes($viajes, $criterio) {
        $resultados = [];

        foreach($viajes as $viaje) {
            if (
                (empty($criterio['destino']) || stripos($viaje->ciudad, $criterio['destino']) !== false) &&
                (empty($criterio['fecha']) || $viaje->fechaViaje == $criterio['fecha']) &&
                (empty($criterio['dias']) || $viaje->duracionViaje == $criterio['dias'])
                ) {
                $resultados[] =$viaje;
            }
        } 

        return $resultados;

    }

}


$viajes = [
    new Viaje(1, "Beluno Apart Hotel", "Florianopolis", "Brasil", "2025-05-01", 3),
    new Viaje(2, "La pousada del mirador", "Buzios", "Brasil", "2025-04-12", 5),
    new Viaje(3, "Hotel Sao Sebastiao da Praia", "Florianopolis", "Brasil", "2025-07-01", 8),
    new Viaje(4, "Hotel el senador", "Madrid", "España", "2025-07-01", 8),
    new Viaje(5, "Le gacson", "Paris", "Francia", "2025-07-01", 8),
    new Viaje(6, "High Sky", "Washington DC", "Estados Unidos", "2025-07-01", 8),
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $criterio = [
        'destino' => $_POST['destino'],
        'fecha' => $_POST['fecha'],
        'dias' => $_POST['dias'],
    ];

    $resultados = Viaje::busquedaViajes($viajes, $criterio);

    if (!empty($resultados)) {
        echo "<h3>Paquetes encontrados:</h3>";
        foreach ($resultados as $viaje) {
            echo "<p>" . $viaje->mostrarDetalles() . "</p>";
            echo "
            <form method='get' action='agregar.php'>
                <input type='hidden' name='id_paquete' value=' " . $viaje->id . "'>
                <input type='submit' value='Agregar al carrito'>
            </form>
            <br>";

        }

    } else {
        echo "<h3>Sin resultados</h3>";
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
        <title>Búsqueda de viajes</title>
    </head>
    <body>
        <div id="formu">
            <fieldset>
                <legend>🧳Búsqueda de viajes🧳</legend>

                <form method="post">
                    <br>
                    <div id="dest">
                        <input type="text" name="destino" placeholder="Lugar de destino">
                    </div>
                    
                    <div id="desd">
                        <input type="date" name="fecha">
                    </div>

                    <div id="Cantidad">
                        <input type="number" name="dias" min="1" max="30" placeholder="Cantidad de días">
                    </div>
                    <div id="buscador">
                        <input type="submit" value="Buscar">
                        <a href="carrito.php"><input type="button" value="Carrito"></a>
                    </div>
                    <br>
                    <button><a href="busqueda_Vuelos.php">Buscar vuelos</a></button>
                    <button><a href="busqueda_Hotel.php">Buscar hoteles</a></button>
                    <br>
                    <br>
                    <button><a href="acceso.php">Cerrar Sesión</a></button>
                </form>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="imagenes/avioncito1.png">
        <link rel="stylesheet" href="styles3.css">
        <title>Búsqueda de vuelos</title>
    </head>
    <body>
        <div id="formu">
            <fieldset>
                <legend>✈️Búsqueda de vuelos✈️</legend>

                <form method="post">
                    <br>
                    <div id="orig">
                        <input type="text" name="origen" placeholder="Lugar de origen">
                    </div>
                    <br>
                    <div id="desd">
                        <input type="date" name="fecha">
                    </div>

                    <div id="dest">
                        <input type="text" name="destino" placeholder="Lugar de destino">
                    </div>
                    <div id="buscador">
                        <input type="submit" value="Buscar">
                        <a href="carrito.php"><input type="button" value="Carrito"></a>
                    </div>
                    <br>
                    <button><a href="busqueda_Viajes.php">Buscar paquetes</a></button>
                    <button><a href="busqueda_Hotel.php">Buscar hoteles</a></button>
                    <br>
                    <br>
                    <button><a href="acceso.php">Cerrar Sesión</a></button>
                </form>
        </div>
    </body>
</html>
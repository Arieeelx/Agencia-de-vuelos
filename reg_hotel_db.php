<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_form.css">
    <link rel="icon" type="image/png" href="imagenes/avioncito1.png">
    <title>Registrar Hotel</title>
    <script>
        function validarHotel() {
            let nombre = document.getElementById("nombre").value.trim();
            let ubicacion = document.getElementById("ubicacion").value.trim();
            let habitaciones = document.getElementById("habitaciones").value;
            let tarifa = document.getElementById("tarifa").value;

            if (nombre === "" || ubicacion === "" || habitaciones === "" || tarifa === "") {
                alert("Todos los campos son obligatorios.");
                return false;
            }
            if (habitaciones <= 0 || tarifa <= 0) {
                alert("Las habitaciones y la tarifa deben ser valores positivos.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div id="form-hotel">
        <h2>Registrar Hotel</h2>
            <form action="procesa_hotel.php" method="POST" onsubmit="return validarHotel();">
                <input type="text" id="nombre" name="nombre" placeholder="Nombre hotel"><br>
                <input type="text" id="ubicacion" name="ubicacion" placeholder="Ubicación"><br>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Habitaciones"><br>
                <input type="number" id="tarifa" name="tarifa" step="5" placeholder="Valor por noche"><br>
                <input type="submit" value="Registrar Hotel">
                <input type="reset">
                <button><a href="formulariodeingresosVyH.html">Volver menu formularios</a></button>
            </form>
    </div> 
</body>
</html>
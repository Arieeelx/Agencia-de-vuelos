<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_form.css">
    <link rel="icon" type="image/png" href="imagenes/avioncito1.png">
    <title>Registrar Vuelo</title>
    <script>
        function validarVuelo() {
            let origen = document.getElementById("origen").value.trim();
            let destino = document.getElementById("destino").value.trim();
            let fecha = document.getElementById("fecha").value;
            let plazas = document.getElementById("plazas").value;
            let precio = document.getElementById("precio").value;

            if (origen === "" || destino === "" || fecha === "" || plazas === "" || precio === "") {
                alert("Todos los campos son obligatorios");
                return false;
            }
            if (origen === destino) {
                alert("El origen y destino no pueden ser iguales.");
                return false;
            }
            if (plazas <= 0 || precio <= 0) {
                alert("Los asientos y el precio deben ser valores positivos.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div id="form-vuelo">
        <h2>Registrar Vuelo</h2>
            <form action="procesa_vuelo.php" method="POST" onsubmit="return validarVuelo();">
                <input type="text" id="origen" name="origen" placeholder="Desde"><br>
                <input type="text" id="destino" name="destino" placeholder="Destino"><br>
                <input type="date" id="fecha" name="fecha"><br>
                <input type="number" id="plazas" name="plazas" placeholder="Asientos disponibles"><br>
                <input type="number" id="precio" name="precio" step="5" placeholder="Precio"><br>
                <input type="submit" value="Registrar Vuelo">
                <input type="reset">
                <button><a href="puente2.html">Volver menu formularios</a></button>
            </form>
    </div>
</body>
</html>
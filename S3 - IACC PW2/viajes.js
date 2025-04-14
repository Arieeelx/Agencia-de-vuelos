// Lista de hoteles
const hoteles = [
    {estadia: "Sao livre", localidad: "Rio de Janeiro, Brasil", fecha:"2025-05-12", precio: 270},
    {estadia: "Las cascanueces", localidad: "Madrid, España", fecha: "2025-05-12", precio: 660},
    {estadia: "La palmera", localidad: "Bogotá, Colombia", fecha: "2025-04-16", precio: 380}
];

// Lista de vuelos
const viajes = [
    {vuelo: "Rio de Janeiro", pais: "Brasil", fecha: "2025-04-28",precio: 300},
    {vuelo: "Madrid", pais: "España", fecha: "2025-06-05",precio: 510},
    {vuelo: "Bogotá", pais: "Colombia", fecha: "2025-05-10",precio: 340},
    {vuelo: "San Andrés", pais: "Colombia", fecha: "2025-03-29",precio: 290}
];

// Lista de paquetes
const paquetes = [
    { destino: "Brasil", ciudad: "Florianópolis", estadia: "Balmere hotel", fecha: "2025-06-15", precio: 920 },
    { destino: "Brasil", ciudad: "Buzios", estadia: "La Pousada", fecha: "2025-05-12", precio: 750 },
    { destino: "España", ciudad: "Madrid", estadia: "Hotel españa", fecha: "2025-07-20", precio: 1000 },
    { destino: "España", ciudad: "Barcelona", estadia: "Santa Cataluña", fecha: "2025-07-08", precio: 1210 },
    { destino: "Colombia", ciudad: "Bogotá", estadia: "La palmera", fecha: "2025-08-10", precio: 950 },
    { destino: "Colombia", ciudad: "San Andrés", estadia: "Gran Sirenis de San Andrés", fecha: "2025-05-19", precio: 1010 }
];

// Función para buscar la información ingresada

function search(tipo) {
    const destinoInput = document.getElementById('destination').value.toLowerCase();
    const vueloInput = document.getElementById('fly').value.toLowerCase();
    const estadiaInput = document.getElementById('hotel').value.toLowerCase();
    
    const fechaPaquete = document.getElementById('travel-date').value;
    const fechaVuelo = document.getElementById('fly-date').value;
    const fechaHotel = document.getElementById('hotel-date').value;

    const resultadosContainer = document.getElementById('results-container');

    resultadosContainer.innerHTML = "";

    // Uso de estucturas de control condicional

    if (tipo === 'paquetes') {
        const resultado = paquetes.filter(paquete =>
            paquete.destino.toLowerCase().includes(destinoInput) &&
            paquete.fecha >= fechaPaquete
        );

        if (resultado.length > 0) {
            resultado.forEach(paquete => {
                resultadosContainer.innerHTML += `
                    <div class="paquete">
                        <h3>${paquete.destino}</h3>
                        <p>Fecha: ${paquete.fecha}</p>
                        <p>Precio: $${paquete.precio} dólares para dos personas. Todo incluído</p>
                        <p>Ciudad: ${paquete.ciudad}</p>
                        <p>Hotel: ${paquete.estadia}</p>
                    </div>`;

                    if (paquete.precio <= 850) {
                        mostrarNotificacion(`¡Oferta especial en ${paquete.destino} por solo $${paquete.precio}! Aprovecha esta oportunidad y se parte de una experiencia inolvidable en ${paquete.estadia}, ${paquete.ciudad}`);
                    }
            });
        } else {
            resultadosContainer.innerHTML = "<p>No se encontraron resultados para paquetes.</p>";
        }

    } else if (tipo === 'vuelos') {
        const resultadoDos = viajes.filter(viaje =>
            viaje.vuelo.toLowerCase().includes(vueloInput) &&
            viaje.fecha >= fechaVuelo
        );

        if (resultadoDos.length > 0) {
            resultadoDos.forEach(viaje => {
                resultadosContainer.innerHTML += `
                    <div class="viaje">
                        <h3>${viaje.vuelo}</h3>
                        <p>Fecha: ${viaje.fecha}</p>
                        <p>Precio: $${viaje.precio} dólares por pasaje.</p>
                    </div>`;
            });
        } else {
            resultadosContainer.innerHTML = "<p>No se encontraron resultados para vuelos.</p>";
        }

    } else if (tipo === 'hoteles') {
        const resultadoTres = hoteles.filter(hotel =>
            hotel.estadia.toLowerCase().includes(estadiaInput) &&
            hotel.fecha >= fechaHotel
        );

        if (resultadoTres.length > 0) {
            resultadoTres.forEach(hotel => {
                resultadosContainer.innerHTML += `
                    <div class="hotel">
                        <h3>${hotel.estadia}</h3>
                        <p>Fecha: ${hotel.fecha}</p>
                        <p>Precio: $${hotel.precio}</p>
                        <p>Localidad: ${hotel.localidad}</p>
                    </div>`;
            });
        } else {
            resultadosContainer.innerHTML = "<p>No se encontraron resultados para hoteles.</p>";
        }
    }
}

function mostrarNotificacion(mensaje) {
    const notificacion = document.createElement('div');
    notificacion.className = 'notificacion';
    notificacion.textContent = mensaje;
    document.body.appendChild(notificacion);

    setTimeout(() => {
        notificacion.remove();
    }, 10000);
}
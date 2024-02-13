// Obtén finalizarCompralos puntos del usuario al cargar la página
document.addEventListener('DOMContentLoaded', obtenerPuntosUsuario);

// Función para obtener los puntos del usuario mediante fetch
function obtenerPuntosUsuario() {
    const idUsuario = document.getElementById('idUsr').value;

    // Verificar si el ID de usuario está disponible
    if (idUsuario) {
        // Hacer la solicitud de puntos utilizando fetch
        fetch(`http://localhost/firaBarcelona/firaBarcelona/?controller=api&action=obtenerPuntos&id_usuario=${idUsuario}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            console.log('Puntos del usuario:', data.puntos);
            // Actualizar los puntos en el front-end
            actualizarPuntosEnInterfaz(data.puntos);
        })
        .catch(error => console.error('Error al obtener los puntos:', error));
    } else {
        console.error('ID de usuario no encontrado en la página');
    }
}

// Función para actualizar los puntos en la interfaz
function actualizarPuntosEnInterfaz(puntos) {
    // Puedes hacer lo que quieras con los puntos en tu interfaz (por ejemplo, mostrarlos en un elemento HTML)
    const puntosElement = document.getElementById('puntos-usuario');
    puntosElement.textContent = `Puntos del usuario: ${puntos}`;
}

// Función para procesar la compra con la opción de utilizar puntos
function procesarCompra() {

    let idUsuario = document.getElementById('idUsr').value;
    let cantidadFinal = document.getElementById('cantidadFinal').value;
    let puntosElement = document.getElementById('puntos-usuario');
    let puntosDisponibles = parseInt(puntosElement.textContent.split(': ')[1]);
   
    if (puntosDisponibles > 0) {
        const utilizarPuntos = confirm("¿Quieres utilizar puntos en esta compra?");
        
        if (utilizarPuntos) {
            let puntosUtilizados = parseInt(prompt("¿Cuántos puntos quieres utilizar?"));
        
            if (puntosUtilizados >= 0 && puntosUtilizados <= puntosDisponibles) {
                
                let reviewData = {
                    idUsuario: idUsuario,
                    cantidadFinal: cantidadFinal,
                    puntosDisponibles: puntosDisponibles,
                    puntosUtilizados: puntosUtilizados
                };
                let reviewJSON = JSON.stringify(reviewData);

                // Realiza la petición POST para utilizar puntos en el servidor
                fetch(`http://localhost/firaBarcelona/firaBarcelona/?controller=api&action=obtenerPuntos`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: reviewJSON
                })
                .then(response => response.text())
                .then(data => {
                    console.log(data);
                        // Actualiza los puntos en el front-end después de la compra
                        obtenerPuntosUsuario();
                        notie.alert({
                            type: 1, 
                            text: `Has utilizado ${puntosUtilizados} puntos y has ganado ${data}.`,
                            time: 4, 
                          })                  
                    
                })
                .catch(error => console.error('Error al utilizar puntos:', error));
            } else {
                notie.alert({
                    type: 3, 
                    text: 'Cantidad de puntos no valida',
                  })
            }
        }
    }else{
        
        let reviewData = {
            idUsuario: idUsuario,
            cantidadFinal: cantidadFinal,
            puntosDisponibles: puntosDisponibles,
            puntosUtilizados: 0
        };
        let reviewJSON = JSON.stringify(reviewData);
        // Realiza la petición POST para utilizar puntos en el servidor
        fetch(`http://localhost/firaBarcelona/firaBarcelona/?controller=api&action=obtenerPuntos`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: reviewJSON
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);

            // Actualiza los puntos en el front-end después de la compra
            obtenerPuntosUsuario();               
            notie.alert({
                type: 1, 
                text: `Has ganado ${data} puntos.`,
              })
            
        })
        .catch(error => console.error('Error al no utilizar puntos:', error));
    }
    setTimeout(function() {
        document.getElementById('finalizarCompra').submit();
    }, 3000); // 2000 milisegundos = 2 segundos
}



// Obtén los puntos del usuario al cargar la página
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

    // Añado parámetros para añadir la propina en la base de datos
    let montoPropinaInput = document.getElementById('montoPropina');
    let totalConPropina = document.getElementById('totalConPropina').innerHTML;

    let porcentajePropina = parseInt(montoPropinaInput.value) + '%';
    let totalConPropinaElement = parseFloat(totalConPropina.replace('€', '').trim());

    // Añado los artículos del pedido
    let cantidadArt = document.getElementById('total').value;
    let articulos = [];

    // Foreach de cantidadArt para recoger los valores cantidad'i' precio'i' id'i'
    for (let i = 0; i < cantidadArt; i++) {
        let precioArtElement = document.getElementById('precio' + i).innerText;
        let precioArt = parseFloat(precioArtElement.replace('€', '').trim());
        let unidadesArt = document.getElementById('cantidad' + i).innerText;
        let idArt = document.getElementById('id' + i).value;

        let art = {
            precioArt: precioArt,
            unidadesArt: unidadesArt,
            idArt: idArt
        };
        articulos.push(art);
    }

    if (puntosDisponibles > 0) {
        const utilizarPuntos = confirm("¿Quieres utilizar puntos en esta compra?");

        if (utilizarPuntos) {
            let puntosUtilizados = parseInt(prompt("¿Cuántos puntos quieres utilizar?"));

            if (puntosUtilizados >= 0 && puntosUtilizados <= puntosDisponibles) {
                let reviewData = {
                    idUsuario: idUsuario,
                    cantidadFinal: cantidadFinal,
                    puntosDisponibles: puntosDisponibles,
                    puntosUtilizados: puntosUtilizados,
                    porcentajePropina: porcentajePropina,
                    totalConPropinaElement: totalConPropinaElement,
                    articulos: articulos
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
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    // Actualiza los puntos en el front-end después de la compra
                    obtenerPuntosUsuario();
                    var puntosGanados = data.puntosGanados;
                    var idPedido = data.idPedido;
                    generarCodigoQR(idPedido);

                    //document.getElementById('bloqueCompra').style.display = 'none';
                    //document.getElementById('qr-code').style.display = 'block';

                    Swal.fire({
                        title: 'Código QR generado',
                        html: `<div id="swal-qr-code"></div><p>Has utilizado ${puntosUtilizados} puntos y has ganado ${puntosGanados} puntos.</p>`,
                        showCloseButton: true,
                        didOpen: () => {
                            const qrElement = document.getElementById('swal-qr-code');
                            new QRCode(qrElement, {
                                text: `http://localhost/firaBarcelona/firaBarcelona/?controller=api&id=${idPedido}`,
                                width: 128,
                                height: 128,
                            });
                        },
                        didClose: () => {
                            // Aquí se enviará el formulario al confirmar el cierre de la ventana emergente
                            document.getElementById('finalizarCompra').submit();
                        }
                    });
                })
                .catch(error => console.error('Error al no utilizar puntos:', error));
            } else {
                notie.alert({
                    type: 3,
                    text: 'Cantidad de puntos no válida',
                });
            }
        } else {
            let reviewData = {
                idUsuario: idUsuario,
                cantidadFinal: cantidadFinal,
                puntosDisponibles: puntosDisponibles,
                puntosUtilizados: 0,
                porcentajePropina: porcentajePropina,
                totalConPropinaElement: totalConPropinaElement,
                articulos: articulos
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
            .then(response => response.json())
            .then(data => {
                console.log(data);
                // Actualiza los puntos en el front-end después de la compra
                obtenerPuntosUsuario();
                var puntosGanados = data.puntosGanados;
                var idPedido = data.idPedido;
                generarCodigoQR(idPedido);

                //document.getElementById('bloqueCompra').style.display = 'none';
                //document.getElementById('qr-code').style.display = 'block';

                Swal.fire({
                    title: 'Código QR generado',
                    html: `<div id="swal-qr-code"></div><p>Has ganado ${puntosGanados} puntos.</p>`,
                    showCloseButton: true,
                    didOpen: () => {
                        const qrElement = document.getElementById('swal-qr-code');
                        new QRCode(qrElement, {
                            text: `http://localhost/firaBarcelona/firaBarcelona/?controller=api&id=${idPedido}`,
                            width: 128,
                            height: 128,
                        });
                    },
                    didClose: () => {
                        // Aquí se enviará el formulario al confirmar el cierre de la ventana emergente
                        document.getElementById('finalizarCompra').submit();
                    }
                });
            })
            .catch(error => console.error('Error al no utilizar puntos:', error));
        }
    } else {
        let reviewData = {
            idUsuario: idUsuario,
            cantidadFinal: cantidadFinal,
            puntosDisponibles: 0,
            puntosUtilizados: 0,
            porcentajePropina: porcentajePropina,
            totalConPropinaElement: totalConPropinaElement,
            articulos: articulos
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
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Actualiza los puntos en el front-end después de la compra
            obtenerPuntosUsuario();
            var puntosGanados = data.puntosGanados;
            var idPedido = data.idPedido;
            generarCodigoQR(idPedido);

            //document.getElementById('bloqueCompra').style.display = 'none';
            //document.getElementById('qr-code').style.display = 'block';

            Swal.fire({
                title: 'Código QR generado',
                html: `<div id="swal-qr-code"></div><p>Has ganado ${puntosGanados} puntos.</p>`,
                showCloseButton: true,
                didOpen: () => {
                    const qrElement = document.getElementById('swal-qr-code');
                    new QRCode(qrElement, {
                        text: `http://localhost/firaBarcelona/firaBarcelona/?controller=api&id=${idPedido}`,
                        width: 128,
                        height: 128,
                    });
                },
                didClose: () => {
                    // Aquí se enviará el formulario al confirmar el cierre de la ventana emergente
                    document.getElementById('finalizarCompra').submit();
                }
            });
        })
        .catch(error => console.error('Error al no utilizar puntos:', error));
    }
}

// Función para generar el código QR
function generarCodigoQR(idPedido) {
    const qrCodeContainer = document.getElementById('qr-code');
    qrCodeContainer.innerHTML = ''; // Limpiar el contenido previo del contenedor QR

    const qr = new QRCode(qrCodeContainer, {
        text: `http://localhost/firaBarcelona/firaBarcelona/?controller=api&id=${idPedido}`,
        width: 128,
        height: 128,
    });
}

document.addEventListener("DOMContentLoaded", function () {

    fetch("http://localhost/firaBarcelona/firaBarcelona/?controller=api&action=buscar_pedido", {
        method: 'POST',
    })

    .then(response => {
        return response.json();
    })

    .then(data => {
        mostrarResenyes(data); 
        agregarEstrellas(); 
    })

    .catch(error => console.error('Error:', error));

});

function mostrarResenyes(resenyes) {
    // Obtén el contenedor de las reseñas
    let resenyesContainer = document.getElementById('resenyes-container');

    // Limpiar el contenedor antes de agregar nuevas reseñas
    resenyesContainer.innerHTML = '';

    // Recorre cada reseña y crea una tarjeta para mostrarla
    resenyes.forEach(resenya => {
        // Crea un elemento div para la tarjeta de la reseña
        let resenyaCard = document.createElement('div');
        resenyaCard.classList.add('resenya-card'); // Agrega una clase para aplicar estilos

        // Construye el HTML con todos los campos de la reseña
        resenyaCard.innerHTML = `
            <div class="info">
                <strong>ID de Pedido:</strong> ${resenya.idPedido}
            </div>
            <div class="info">
                <strong>ID de Usuario:</strong> ${resenya.idUsr}
            </div>
            <div class="info">
                <strong>Nota:</strong> ${resenya.nota}
            </div>
            <div class="resena">
                <strong>Reseña:</strong> ${resenya.txtResena}
            </div>
        `;

        // Agrega la tarjeta de reseña al contenedor
        resenyesContainer.appendChild(resenyaCard);
    });
}


function agregarEstrellas() {
    const stars = document.querySelectorAll('.rating-container .fa-star');
    const radios = document.querySelectorAll('.rating-container input');

    stars.forEach((star, index) => {
        star.addEventListener('click', () => {
            // Marca la estrella clicada y las anteriores
            for (let i = 0; i <= index; i++) {
                radios[i].checked = true;
            }

            // Desmarca las estrellas a la derecha
            for (let i = index + 1; i < radios.length; i++) {
                radios[i].checked = false;
            }
        });
    });
}

function submitReview() {
    // Obtener los valores del formulario
    let orderNumber = document.getElementById('orderNumber').value;
    let rating = document.getElementById('rating').value;
    let comment = document.getElementById('comment').value;
    let idUsr = document.getElementById('idUsr').value;

    // Crear el objeto de datos a enviar
    let reviewData = {
        orderNumber: orderNumber,
        idUsr: idUsr,
        rating: rating,
        comment: comment
    };

    let rewiewJSON = JSON.stringify(reviewData);

    fetch('http://localhost/firaBarcelona/firaBarcelona/?controller=api&action=insertar_resena', {
        method: 'POST',
        headers: {
            'Content-Type':'application/json',
        },
        body: rewiewJSON
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        // Puedes realizar alguna acción después de enviar la reseña, como actualizar la interfaz de usuario.
    })
    .catch(error => {
        console.error('Error al enviar la reseña:', error);
    });

}
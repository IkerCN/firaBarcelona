document.addEventListener("DOMContentLoaded", function () {

    fetch("/?controller=api&action=buscar_pedido", {
        method: 'POST',
    })

    .then(response => {
        return response.json();
    })

    .then(data => {
        let noPedido = document.getElementById('noPedidos').value;
console.log(noPedido);
        let selectElement = document.getElementById('orderNumber');
        let numberOfOptions = selectElement.options.length;

        if(noPedido != 0){
            if (numberOfOptions === 0) {
                document.getElementById('addReviewForm').style.display = 'none';
                document.getElementById('noReviewMessage').style.display = 'block';
            }
        }

        mostrarResenyes(data); 
        agregarEstrellas(); 
    })
    .catch(error => {
        notie.alert({
            type: 3, 
            text: 'Error al obtener las reseñas',
        })
          console.error('Error al obtener las reseñas:', error);
    });

    
    let filterRating = document.getElementById('filterRating');
    let sortOrder = document.getElementById('sortOrder');

    filterRating.addEventListener('change', actualizarResenyes);
    sortOrder.addEventListener('change', actualizarResenyes);

});
function actualizarResenyes() {
    // Realizar la solicitud para obtener las reseñas actualizadas
    fetch("/?controller=api&action=buscar_pedido", {
        method: 'POST',
    })
    .then(response => response.json())
    .then(updatedData => {
        // Mostrar las reseñas actualizadas con filtros aplicados
        mostrarResenyes(updatedData);
        agregarEstrellas();
    })
    .catch(error => {
        notie.alert({
            type: 3, 
            text: 'Error al obtener las reseñas actualizadas',
        })
          console.error('Error al obtener las reseñas actualizadas:', error);
    });

}

function mostrarResenyes(resenyes) {
    let filterRating = document.getElementById('filterRating').value;
    let sortOrder = document.getElementById('sortOrder').value;

    // Filtra las reseñas según la valoración seleccionada
    let filteredResenyes = resenyes.filter(resenya => {
        if (filterRating === '0') {
            return true; // Mostrar todas las reseñas si se selecciona "Totes"
        } else {
            return resenya.nota === parseInt(filterRating);
        }
    });

    // Ordena las reseñas según el criterio seleccionado
    if (sortOrder === 'asc') {
        filteredResenyes.sort((a, b) => a.nota - b.nota);
    } else {
        filteredResenyes.sort((a, b) => b.nota - a.nota);
    }

    // Obtén el contenedor de las reseñas
    let resenyesContainer = document.getElementById('resenyes-container');
    let resenyesForm = document.getElementById('resenyes-form');

    // Limpiar el contenedor antes de agregar nuevas reseñas
    resenyesContainer.innerHTML = '';

    // Recorre cada reseña y crea una tarjeta para mostrarla
    filteredResenyes.forEach(resenya => {
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

    let btnInsertar = document.getElementById("btnInsertar");
    btnInsertar.disabled = true;
    //btnInsertar.classList.add("deshabilitado");

    if(orderNumber != 0){
        // Crear el objeto de datos a enviar
        let reviewData = {
            orderNumber: orderNumber,
            idUsr: idUsr,
            rating: rating,
            comment: comment
        };

        let reviewJSON = JSON.stringify(reviewData);

        // Realizar la solicitud para insertar la reseña
        fetch('/?controller=api&action=insertar_resena', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: reviewJSON
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);

            actualizarResenyes()
            let selectElement = document.getElementById('orderNumber');
            selectElement.remove(document.getElementById('orderNumber').selectedIndex);

            let numberOfOptions = selectElement.options.length;
            if (numberOfOptions === 0) {
                document.getElementById('addReviewForm').style.display = 'none';
                document.getElementById('noReviewMessage').style.display = 'block';
            }else{
                notie.alert({
                    type: 1, 
                    text: 'La reseña se ha añadido con exito',
                    time: 4, 
                  })
                btnInsertar.disabled = false;
            }
        })
        .catch(error => {
            notie.alert({
                type: 3, 
                text: 'Error al enviar la reseña',
              })
            console.error('Error al enviar la reseña:', error);
        });
        
    }else{

        actualizarResenyes()
        document.getElementById('addReviewForm').style.display = 'none';
        document.getElementById('noReviewMessage').style.display = 'block';  
    }
}

document.addEventListener("DOMContentLoaded", function () {

    fetch("http://localhost/firaBarcelona/firaBarcelona/?controller=api&action=api",{
        method : 'POST',
        headers : {
            'Content-Type' : 'application/x-www-form-urlencodded',
        },
        body : new URLSearchParams({
            accion : 'buscar_pedido',
        }),
    })

    .then(response => {
        return response.json();
    })

    .then(data => {
        mostrarResenas(data);
    })

    .catch(error => {
        console.error(error);
    });

});
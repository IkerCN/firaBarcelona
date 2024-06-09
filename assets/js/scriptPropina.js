document.addEventListener('DOMContentLoaded', handlePropinaChange);

function handlePropinaChange() {
    var omitirPropinaCheckbox = document.getElementById('omitirPropina');
    var montoPropinaInput = document.getElementById('montoPropina');
    var porcentajePropinaElement = document.getElementById('porcentajePropina');
    var totalConPropinaElement = document.getElementById('totalConPropina');

    // Obtener el valor actualizado de cantidadFinal y convertirlo a un número
    var precioTotalElement = document.getElementById('cantidadFinal');
    var precioTotal = parseFloat(precioTotalElement.value);

    if (omitirPropinaCheckbox.checked) {
        montoPropinaInput.disabled = true;
        montoPropinaInput.value = 0;
        porcentajePropinaElement.textContent = '0%';
    } else {
        montoPropinaInput.disabled = false;
        var nuevoPorcentaje = parseInt(montoPropinaInput.value);
        porcentajePropinaElement.textContent = nuevoPorcentaje + '%';
    }

    // Actualizar el total con propina
    var porcentajePropina = parseInt(montoPropinaInput.value);
    var totalConPropina = precioTotal + (precioTotal * porcentajePropina / 100);
    totalConPropinaElement.textContent = totalConPropina.toFixed(2) + ' €';

}

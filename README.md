[**¡Link a la web!**](ikercandalija.bernat2024.es)


En la carpeta "Documentacion" estan el moodboard, la documentació del projecte i el fitxer de l'exportació de la base de dades de la web.

Explicacion JavaScript y Api:

# Archivo PHP (API)

## Método `index`:

- Se encarga de mostrar detalles de un pedido y productos asociados.
- Redirecciona si no se proporciona un ID de pedido.

## Método `buscar_pedido`:

- Realiza una consulta a la base de datos para obtener reseñas y las devuelve como JSON.

## Método `insertar_resena`:

- Procesa datos JSON recibidos y los inserta en la tabla de reseñas.
- Actualiza el campo de reseña en la tabla de pedidos.

## Método `obtenerPuntos`:

- Maneja solicitudes GET y POST para obtener y actualizar puntos de usuario.
- Actualiza puntos según la lógica de la aplicación y almacena un pedido en la base de datos.

## Método `mostrar_pedido`:

- Obtiene información detallada de un pedido y productos asociados.

## Método `obtenerInformacionPedido`:

- Función auxiliar para obtener información detallada de un pedido y sus productos.

## Método `generar_qr`:

- Genera la URL de un QR asociado a un pedido y la devuelve como JSON.

En resumen, el archivo PHP proporciona funciones para manejar pedidos, reseñas, puntos de fidelidad, y la generación de QRs. La implementación está principalmente en PHP, pero la lógica del lado del cliente y la comunicación con la API se realizarían con JavaScript.

# Ficheros JavaScript

## Reseñas:

Este script maneja la interacción con las reseñas en la interfaz de usuario. Inicialmente, realiza una solicitud POST para obtener las reseñas mediante la API en el método `buscar_pedido`. Luego, muestra las reseñas filtradas y ordenadas según los valores seleccionados en la interfaz. Además, permite filtrar y ordenar las reseñas mediante eventos de cambio en elementos select. El formulario también permite la inserción de nuevas reseñas, actualizando dinámicamente la interfaz después de la inserción.

## Puntos:

Este script se encarga de gestionar los puntos del usuario al cargar la página y procesar compras. Utiliza fetch para obtener y actualizar puntos del usuario desde la API en el método `obtenerPuntosUsuario`. La función `procesarCompra` realiza la compra, permitiendo al usuario utilizar puntos y generando un código QR asociado al pedido. También se actualiza la interfaz con los nuevos puntos ganados.

## Propinas:

Este script maneja los cambios en la propina en la interfaz de compra. Detecta cambios en la selección de omitir propina, actualizando dinámicamente el monto y porcentaje de propina, así como el total con propina.

## Filtros con LocalStorage:

Este script utiliza LocalStorage para almacenar y recuperar las categorías seleccionadas por el usuario. Al cargar la página, configura los checkboxes según las categorías almacenadas. Además, añade un evento de cambio a los checkboxes para actualizar y mostrar/ocultar productos y nombres de categorías en la interfaz según las selecciones del usuario.

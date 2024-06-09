<?php
include_once 'controller/productoController.php';
include_once 'controller/apiController.php';
include_once 'controller/usuarioController.php';
include_once 'config/parameters.php';

// Verificar si se proporciona el controlador en la URL
if (!isset($_GET['controller'])) {
    // Redirigir a la página principal de pedidos si no se proporciona ningún controlador
    header("Location:". URL ."?controller=producto");
    exit(); // Detener la ejecución después de la redirección
} else {
    $nombre_controller = $_GET['controller'].'Controller';

    // Verificar si la clase del controlador existe
    if (class_exists($nombre_controller)) {
        $controller = new $nombre_controller();

        // Verificar si se proporciona una acción
        if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
            $action = $_GET['action'];
        } else {
            // Si no se proporciona una acción, usar la acción por defecto definida en parameters.php
            $action = action_default;
        }

        // Llamar a la acción correspondiente en el controlador
        $controller->$action();
    } elseif ($_GET['controller'] == 'api') {
        // Si el controlador es 'api', utilizar el apiController
        $apiController = new apiController();
        
        // Verificar si se proporciona una acción
        if (isset($_GET['action']) && method_exists($apiController, $_GET['action'])) {
            $action = $_GET['action'];
        } else {
            // Si no se proporciona una acción, redirigir a la página principal
            header("Location:" . URL . "?controller=producto");
            exit(); // Detener la ejecución después de la redirección
        }
    
        // Llamar a la acción correspondiente en el apiController
        $apiController->$action();
    } else {
        // Si el controlador no existe, redirigir a la página principal de pedidos
        header("Location:" . URL . "?controller=producto");
        exit(); // Detener la ejecución después de la redirección
    }
}
?>

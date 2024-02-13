<?php
    include_once 'config/db.php';
    include_once 'model/usuariosDAO.php';
    include_once 'utils/CalculadoraPrecios.php';

class apiController{
    function buscar_pedido()
    {
        $con = db::connect();
        $stmt = $con->prepare("SELECT * FROM resenas");
    
        $stmt->execute();
        $result = $stmt->get_result();

        $res = [];

        if ($result->num_rows > 0) {
            // Obtener datos de la base de datos
            while ($row = $result->fetch_assoc()) {
                $res[] = array(
                    'idPedido' => $row['idPedido'],
                    'idUsr' => $row['idUsr'],  
                    'nota' => $row['nota'],
                    'txtResena' => $row['txtResena']
                );
            }
        }
        $con->close(); 

        header('Content-Type: application/json');
        echo json_encode($res);    
        return;
    }

    function insertar_resena(){

        $inputJson = file_get_contents('php://input');
        $data = json_decode($inputJson, TRUE); //convert JSON into array

        if(isset($data['orderNumber']) && isset($data['idUsr']) && isset($data['rating']) && isset($data['comment'])){

           $orderNumber = $data['orderNumber'];
           $idUsr = $data['idUsr'];
           $rating = $data['rating'];
           $comment = $data['comment'];

           // Validar y procesar los datos según sea necesario
           $con = db::connect();
           $stmt = $con->prepare("INSERT INTO `resenas` (`idPedido`, `idUsr`, `nota`, `txtResena`) VALUES (?, ?, ?, ?)");
           $stmt->bind_param("iiis", $orderNumber, $idUsr, $rating, $comment);


            if ($stmt->execute()) {
                
                echo "Reseña agregada correctamente";
                $idResena = $stmt->insert_id;

                $stmt = $con->prepare("UPDATE `pedidos` SET `resena` = ? WHERE `idPedido` = ?");
                $stmt->bind_param("ii", $idResena, $orderNumber);
                $stmt->execute();
            } else {
                echo "Error al ejecutar la consulta: " . $stmt->error;
            }   

        // Cerrar la conexión a la base de datos
        $con->close();
        return;
        
        }
    }

    //Fidelidad de clientes
    function obtenerPuntos(){
        // Obtener puntos de un usuario
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {   
            $idUsuario = $_GET['id_usuario'] ?? null;

            if ($idUsuario !== null) {
                // Your existing logic to get user points
                $usuarios = usuariosDAO::getAllUsers();
                $foundUser = null;
            
                foreach ($usuarios as $user) {
                    if ($user->getIdUsr() == $idUsuario) {
                        $foundUser = $user;
                        break;
                    }
                }
            
                if ($foundUser !== null) {
                    $puntosUsuario = $foundUser->getPuntos();
                    echo json_encode(['puntos' => $puntosUsuario]);
                } else {
                    http_response_code(404);
                    echo json_encode(['error' => 'Usuario no encontrado']);
                }
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'ID de usuario no proporcionado en la solicitud']);
            }
        }

        // Actualizar puntos de un usuario
        elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $inputJson = file_get_contents('php://input'); 
            $data = json_decode($inputJson, TRUE);

            
            if(isset($data['idUsuario']) && isset($data['puntosDisponibles']) && isset($data['puntosUtilizados']) && isset($data['cantidadFinal'])){

               $idUsuario = $data['idUsuario'];
               $puntosOriginales = $data['puntosDisponibles'];
               $puntosUtilizados = $data['puntosUtilizados'];
               $cantidadFinal = $data['cantidadFinal'];

                // Verificar si los datos son válidos
                if ($puntosUtilizados !== null ) {
                    // Restar los puntos utilizados
                    $puntosRestados = ($puntosOriginales - $puntosUtilizados);
                    //usuariosDAO::actualizarPuntos($idUsuario, $puntosTotales);
                
                    // Calcular nuevos puntos ganados según la lógica de tu aplicación
                    $puntosGanados = $cantidadFinal * 100;
                
                    // Sumar los nuevos puntos ganados
                    $puntosFinales = $puntosRestados + $puntosGanados;
                
                    // Actualizar los puntos totales del usuario
                    usuariosDAO::actualizarPuntos($idUsuario, $puntosFinales);
                
                    // Devolver una respuesta de éxito en formato JSON
                    echo json_encode([$puntosGanados]);
                } else {
                    // Datos no válidos, responder con un código de error
                    http_response_code(400);
                    echo json_encode(['error' => 'Solicitud no válida']);
                }
            } else {
                // Método no permitido, responder con un código de error
                http_response_code(405);
                echo json_encode(['error' => 'Método no permitido']);
            }


        }
        return;
    }
}

?>

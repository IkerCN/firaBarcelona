<?php
    include_once 'config/db.php';

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
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/resenasStyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Ressenyes del Restaurant</title>
</head>
<body>
    <div id="filter">
        <label>Filtrar per nota:</label>
        <select id="filterRating">
            <option value="0">Totes</option>
            <option value="1">1 estrella</option>
            <option value="2">2 estrelles</option>
            <option value="3">3 estrelles</option>
            <option value="4">4 estrelles</option>
            <option value="5">5 estrelles</option>
        </select>
        <label>Ordenar per nota:</label>
        <select id="sortOrder">
            <option value="desc">Ascendent</option>
            <option value="asc">Descendent</option>
        </select>
    </div>

    <div id="resenyes-container"></div>
    <div id="noReviewMessage" style="display: none;">
        <p>Todos tus pedidos tienen ya una reseña.</p>
    </div>
    <div class="container mt-5">
        <form id="addReviewForm">
            <h2 class="mb-4">Afegir Ressenya</h2>
    
            <div class="form-group">
                <label for="orderNumber">Número de Comanda:</label>
            <?php
                $enviar = true;
               if (empty($pedidos)) {
                   echo '<select class="form-control" id="orderNumber" required disabled></select>';  
                   echo '<option value="0" id="noPedidos" active>Haz algun pedido para poder insertar reseñas.</option>';
                   $enviar = false;
                }else{                        
                    echo '<select class="form-control" id="orderNumber" required>';
                    foreach ($pedidos as $pedido){
                        $enviar = false;
                        if ($pedido->getResena() == '' || $pedido->getResena() == ' ') {
                            echo "<option value='".$pedido->getIdPedido()."'>".$pedido->getIdPedido()."</option>";  
                            $enviar = true;
                        }
                    }
                    echo '<option value="1" id="noPedidos" hidden>Todos tus pedidos tienen ya una reseña.</option>';                        
                    echo '</select>';
                }
            
            ?>
            </div>
    
            <div class="form-group">
                <label for="rating">Nota:</label>
                <select class="form-control" id="rating" required>
                    <option value="1">1 estrella</option>
                    <option value="2">2 estrelles</option>
                    <option value="3">3 estrelles</option>
                    <option value="4">4 estrelles</option>
                    <option value="5">5 estrelles</option>
                </select>
            </div>
            
            <!-- Prueba de iconos de estrella
            <div class="rating-container">
                <label for="star1"><i class="fas fa-star"></i></label>
                <input type="radio" id="star1" name="rating" value="1">
                    
                <label for="star2"><i class="fas fa-star"></i></label>
                <input type="radio" id="star2" name="rating" value="2">
                    
                <label for="star3"><i class="fas fa-star"></i></label>
                <input type="radio" id="star3" name="rating" value="3">
                    
                <label for="star4"><i class="fas fa-star"></i></label>
                <input type="radio" id="star4" name="rating" value="4">
                    
                <label for="star5"><i class="fas fa-star"></i></label>
                <input type="radio" id="star5" name="rating" value="5">
            </div> -->
    
            <div class="form-group">
                <label for="comment">Comentari:</label>
                <textarea class="form-control" id="comment" rows="3" required></textarea>
            </div>
            <?php
    
    if (!$enviar) {
        ?>
            <button type="button" class="btn btn-primary" disabled>Afegir Ressenya</button>

                   
        <?php }else{ ?>
            <input hidden name="idUsr" id="idUsr" value="<?=$_SESSION['id_usuari']?>">
            <button type="button" class="btn btn-primary" id="btnInsertar" onclick="submitReview()">Afegir Ressenya</button>

            <?php 
            }
            ?>  
        </form>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> -->
    <script src="https://unpkg.com/notie"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
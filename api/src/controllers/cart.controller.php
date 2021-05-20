<?php 
    require_once 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/config/db.php';

    class CartController {

        public static function addCart($userId, $courseId) {
            $sql = "INSERT INTO `cart`(`user`, `course`) VALUES ('.$userId.','.$courseId.')";

            try{
                $db = new db();
                $db = $db->connection();
                $result = $db->query($sql);

                if (!$result) {
                    echo '{"error" : {"text":'.$db->error.'} }';								
                } else {
                    echo '{"message" : { "status": "200" , "text": "Articulo del carrito creada satisfactoriamente." } }';
                }

                $result = null;
                $db = null;
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'} }';
            }
        }

        public static function getCartByUser($idUser) {
            $sql = "CALL `proc_get_cart_user`(".$idUser.");";
    
            try{
                $db = new db();
                $db = $db->connection();
                $result = $db->query($sql);

                if($result) {
                    // Recorremos los resultados devueltos
			        $articulos = array();
			        while( $articulo = $result->fetch_assoc()) {
                        $articulos[] = $articulo;
			        }			
			        return $articulos;
                }else {
                    echo json_encode("No existen articulos del usuario en la db en la BBDD.");
                    return null;
                }
    
                $result = null;
                $db = null;
    
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'} }';
            }
        }

        public function getCartCountItems($id) {
            
            $sql = "CALL `proc_get_cart_count`(".$id.")";
            try{
                $db = new db();
                $db = $db->connection();
                $result = $db->query($sql);

                if($result) {
                    // Recorremos los resultados devueltos
			        while( $amount = $result->fetch_assoc()) {
                        return $amount;
			        }
                }else {
                    echo json_encode("No en la BBDD.");
                    return null;
                }
    
                $result = null;
                $db = null;
    
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'} }';
            }    
        }

        public static function deleteItem($id) {
            $sql = "DELETE FROM `cart` WHERE id = ".$id;

            try{
                $db = new db();
                $db = $db->connection();
                $result = $db->query($sql);

                if (!$result) {
                    echo '{"error" : {"text":'.$db->error.'} }';								
                } else {
                    echo '{"message" : { "status": "200" , "text": "Articulo borrado correctamente." } }';
                }

                $result = null;
                $db = null;
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'} }';
            }
        }

        public static function deleteCart($id) {
            $sql = "DELETE FROM `cart` WHERE user = ".$id;

            try{
                $db = new db();
                $db = $db->connection();
                $result = $db->query($sql);

                if (!$result) {
                    echo '{"error" : {"text":'.$db->error.'} }';								
                } else {
                    echo '{"message" : { "status": "200" , "text": "Carrito borrado correctamente." } }';
                }

                $result = null;
                $db = null;
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'} }';
            }
        }

    }

?>
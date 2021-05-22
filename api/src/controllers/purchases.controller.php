<?php
    require_once 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/config/db.php';

    class purchasesController{

        public static function addPurchase($userId, $courseId){
            $sql = "INSERT INTO purchases(id_user, id_course) VALUES('.$userId.', '.$courseId.')";

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

        public static function getUserPurchases($userId){
            $sql = "SELECT * FROM purchases WHERE id_user = ".$userId." ORDER BY id";

            try{
                $db = new db();
                $db = $db->connection();
                $result = $db->query($sql);

                if (!$result) {
                    echo "Problema al hacer un query: " . $db->error;								
                } else {
                    $purchases  = array();
                    while($p = $result->fetch_assoc()){
                        $purchases[] = $p;
                    }
                    return $purchases;
                }

                $result = null;
                $db = null;
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'} }';
            }
        }

        public static function deletePurchase($id){
            $sql = "DELETE FROM purchases WHERE id = ".$id;

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
    }
?>
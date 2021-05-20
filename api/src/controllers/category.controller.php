<?php 
    require_once 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/config/db.php';

    class CategoryController {

        public static function addCategory($nameCategory, $date) {
            $date = date('c');
            
            $sql = "INSERT INTO `categories`(`categoryName`, `createdAt`) VALUES ('".$nameCategory."','".$date."')";

            try{
                $db = new db();
                $db = $db->connection();
                $result = $db->query($sql);

                if (!$result) {
                    echo '{"error" : {"text":'.$db->error.'} }';								
                } else {
                    echo '{"message" : { "status": "200" , "text": "Categoria creada satisfactoriamente." } }';
                }

                $result = null;
                $db = null;
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'} }';
            }
        }
        
        public static function getCategories() {
            $sql = "SELECT * FROM categories";

            try{
                $db = new db();
                $db = $db->connection();
                $result = $db->query($sql);

                if(!$result) {
                    echo "Problemas al hacer el query: " . $db->error;
                } else {
                    $categories = array();
                    while($category = $result->fetch_assoc()) {
                        $categories[] = $category;
                    } 
                    if(count($categories) > 0) {
                        return $categories;
                    } else {
                        echo '{"message" : "No hay categorias registrados"}';
                    }
                }

                $result = null;
                $db = null;
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'} }';
            }
        }

    }

?>
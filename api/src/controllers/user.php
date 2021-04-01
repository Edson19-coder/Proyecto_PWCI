<?php

    require 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/config/db.php';

    class UserController {

        public function getAllUsers() {
            $sql = "SELECT * FROM users";
    
            try{
                $db = new db();
                $db = $db->connection();
                $result = $db->query($sql);

                if($result) {
                    // Recorremos los resultados devueltos
			        $users = array();
			        while( $user = $result->fetch_assoc()) {
				        $users[] = $user;
			        }			
			        return $users;
                    /*foreach ($users as $key => $value) {
                        echo $value["username"];
                    }*/
                }else {
                    echo json_encode("No existen usuarios en la BBDD.");
                    return null;
                }
    
                $result = null;
                $db = null;
    
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'}';
            }
        }
        
    }

?>
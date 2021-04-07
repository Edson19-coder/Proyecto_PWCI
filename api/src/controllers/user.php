<?php

    require 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/config/db.php';

    class UserController {

        public function addUser($user) {
            
            $email = $user->getEmail(); 
            $userPassword = $user->getUserPassword();
            $userName = $user->getUserName();
            $firstName = $user->getFirstName();
            $secondName = $user->getSecondName();
            $lastName = $user->getLastName();

            if($user->getSecondName()) {
                $sql = "INSERT INTO `users`(`email`, `userPassword`, `username`, `firstName`, `secondName`, `lastNames`) 
                VALUES ('".$email."','".$userPassword."','".$userName."','".$firstName."','".$secondName."','".$lastName."')";
            } else {
                $sql = "INSERT INTO `users`(`email`, `userPassword`, `username`, `firstName`, `lastNames`) 
                VALUES ('".$email."','".$userPassword."','".$userName."','".$firstName."','".$lastName."')";
            }

            try{
                $db = new db();
                $db = $db->connection();
                $result = $db->query($sql);

                if (!$result) {
                    echo "Problema al hacer un query: " . $db->error;								
                } else {
                    echo '{"message" : { "status": "200" , "text": "Usuario creado satisfactoriamente." }';
                }

                $result = null;
                $db = null;
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'}';
            }

        }
        
        public function getUser($id) {
            $sql = "SELECT * FROM users WHERE id = ".$id."";
            try{
                $db = new db();
                $db = $db->connection();
                $result = $db->query($sql);

                if($result) {
                    // Recorremos los resultados devueltos
			        $users = array();
			        while( $user = $result->fetch_assoc()) {
                        return $user;
			        }
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
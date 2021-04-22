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
                    echo '{"message" : { "status": "200" , "text": "Usuario creado satisfactoriamente." } }';
                }

                $result = null;
                $db = null;
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'}';
            }

        }
        
        public function getUserById($id) {
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

        public static function getUserByEmailPassword($email, $password){
            $sql = "SELECT * FROM users WHERE email = '".$email."' AND userPassword = '".$password."'";

            try{
                $db = new db(); //Nueva instancia a la DB
                $db = $db->connection(); //Se hace la conexión
                $result = $db->query($sql); // Se ejecuta el query

                if($result){
                    $users = array();
                    while ($user = $result->fetch_assoc()) { //Se recorre el arreglo con cada resultado de la consulta
                        $users[] = $user;
                    }
                    return $users; //Se regresa el array con todos los resultados
                }else{
                    echo json_encode("No existe este usuario en la DB."); //a
                    return null;
                }
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'} }'; //a
            }
        }
    }

?>
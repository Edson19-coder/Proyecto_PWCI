<?php

    require 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/config/db.php';

    class UserController {

        /*          TODOS LOS INSERT            */
        public static function addUser($email, $userPassword, $userName, $firstName, $secondName, $lastName) {

            if($secondName) {
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
                echo '{"error" : {"text":'.$e->getMessage().'} }';
            }

        }

        /*          TODOS LOS UPDATE            */

        public static function updateUser($id, $email, $userPassword, $userName, $firstName, $secondName, $lastName,$birthday, $country, $state, $city, $postalCode, $profilePicture){
            
            $userName = $userName ? $userName : null;
            $firstName = $firstName ? $firstName : null;
            $secondName = $secondName ? $secondName : null;
            $lastName = $lastName ? $lastName : null;
            $birthday = $birthday ? $birthday : null;
            $country = $country ? $country : null;
            $state = $state ? $state : null;
            $city = $city ? $city : null;
            $postalCode = $postalCode ? $postalCode : 0;
            $profilePicture = $profilePicture ? $profilePicture : null;
            

            if($id){
                $sql = "UPDATE users SET email = '".$email."', userPassword = '".$userPassword."', username = '".$userName."', firstName = '".$firstName."',
                        secondName = '".$secondName."', lastNames = '".$lastName."', birthday = '".$birthday."', country = '".$country."', `state` = '".$state."',
                        city = '".$city."', postalCode = ".$postalCode.", profilePicture = '".$profilePicture."' WHERE id = ".$id.";";
            }
            
            try{
                $db = new db();
                $db = $db->connection();
                $result = $db->query($sql);

                if (!$result) {
                    echo "Problema al hacer un query: " . $db->error;								
                } else {
                    echo '{"message" : { "status": "200" , "text": "Usuario modificado satisfactoriamente." } }';
                }

                $result = null;
                $db = null;
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'} }';
            }
        }

        /*          TODOS LOS SELECT            */
        public function getUserById($id) {
            
            $sql = "CALL `proc_profile_user`(".$id.")";
            try{
                $db = new db();
                $db = $db->connection();
                $result = $db->query($sql);

                if($result) {
                    // Recorremos los resultados devueltos
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
                echo '{"error" : {"text":'.$e->getMessage().'} }';
            }    
        }

        public static function getAllUsers() {
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
                echo '{"error" : {"text":'.$e->getMessage().'} }';
            }
        }

        public static function getUserByEmailPassword($email, $password){
            $sql = "SELECT * FROM users WHERE email = '".$email."' AND userPassword = '".$password."'";

            try{
                $db = new db(); //Nueva instancia a la DB
                $db = $db->connection(); //Se hace la conexión
                $result = $db->query($sql); // Se ejecuta el query

                if($result){
                    while ($user = $result->fetch_assoc()) { //Se recorre el arreglo con cada resultado de la consulta
                        return $user;
                    }
                }else{
                    echo json_encode("No existe este usuario en la DB."); //a
                    return null;
                }
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'} }'; //a
            }
        }
        
        public static function getUserByUsername($username){
            $sql = "SELECT * FROM users WHERE username = '".$username."'";

            try{
                $db = new db();
                $db = $db->connection();
                $result = $db->query($sql);

                if($result){
                    while ($user = $result->fetch_assoc()) {
                        return $user;
                    }
                }else{
                    echo json_encode("No existe este usuario en la DB.");
                    return null;
                }
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'} }';
            }
        }
    }

?>
<?php 
    require_once 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/config/db.php';

    class ChatController {

        public static function addMessage($textMessage, $emmiter, $receiver) {
            $date = date('c');
            $sql = "INSERT INTO `messages`(`textMessage`, `createdAt`, `emmiter`, `receiver`) 
            VALUES ('".$textMessage."', '".$date."', '.$emmiter.', '.$receiver.')";

            try{
                $db = new db();
                $db = $db->connection();
                $result = $db->query($sql);

                if (!$result) {
                    echo '{"error" : {"text":'.$db->error.'} }';								
                } else {
                    echo '{"message" : { "status": "200" , "text": "Mensaje creada satisfactoriamente." } }';
                }

                $result = null;
                $db = null;
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'} }';
            }

        }

        public static function getMessagesByUser($me, $friend) {
            $sql = "CALL `proc_get_messages`('.$me.', '.$friend.');";

            try{
                $db = new db();
                $db = $db->connection();
                $result = $db->query($sql);

                if (!$result) {
                    echo "Problema al hacer un query: " . $db->error;								
                } else {
                    $messages = array();
                    while($message = $result->fetch_assoc()){
                        $messages[] = $message;
                    }
                    return $messages;
                }

                $result = null;
                $db = null;
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'} }';
            }
        }
    }
?>
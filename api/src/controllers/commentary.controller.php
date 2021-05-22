<?php 
    require_once 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/config/db.php';

    class CommentaryController {

        public static function addCommentary($txtCommentary, $emmiter, $course) {
            $date = date('c');
            $sql = "INSERT INTO `comments`(`txtCommentary`, `createdAt`, `emmiter`, `course`) 
            VALUES ('".$txtCommentary."', '".$date."', '.$emmiter.', '.$course.')";

            try{
                $db = new db();
                $db = $db->connection();
                $result = $db->query($sql);

                if (!$result) {
                    echo '{"error" : {"text":'.$db->error.'} }';								
                } else {
                    echo '{"message" : { "status": "200" , "text": "Comentario creada satisfactoriamente." } }';
                }

                $result = null;
                $db = null;
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'} }';
            }

        }

        public static function getCommentsByCourse($courseId) {
            $sql = "CALL `proc_get_commentaries_course`(".$courseId.");";

            try{
                $db = new db();
                $db = $db->connection();
                $result = $db->query($sql);

                if (!$result) {
                    echo "Problema al hacer un query: " . $db->error;								
                } else {
                    $commentaries = array();
                    while($commentary = $result->fetch_assoc()){
                        $commentaries[] = $commentary;
                    }
                    return $commentaries;
                }

                $result = null;
                $db = null;
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'} }';
            }
        }
    }
?>
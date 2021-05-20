<?php 

    require_once 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/config/db.php';

    class LessonContentController {

        public static function getVideoByLessonId($lessonId) {
            if($lessonId) {
                $sql = "SELECT * FROM videos WHERE lesson = ".$lessonId.";";

                try{
                    $db = new db();
                    $db = $db->connection();
                    $result = $db->query($sql);
    
                    if($result) {
                        // Recorremos los resultados devueltos
                        while( $video = $result->fetch_assoc()) {
                            return $video;
                        }
                    }else {
                        echo json_encode("No existen el video en la BBDD.");
                        return null;
                    }
        
                    $result = null;
                    $db = null;
        
                }catch(PDOException $e){
                    echo '{"error" : {"text":'.$e->getMessage().'} }';
                }
            }    
        }

        public static function deleteVideoByLessonId($lessonId) {
            if($lessonId) {
                $sql = "DELETE FROM `videos` WHERE lesson = ".$lessonId.";";
            
                try{
                    $db = new db();
                    $db = $db->connection();
                    $result = $db->query($sql);
    
                    if (!$result) {
                        echo "Problema al hacer un query: " . $db->error;								
                    } else {
                        echo '{"message" : { "status": "200" , "text": "Video de leccion eliminada satisfactoriamente." } }';
                    }
    
                    $result = null;
                    $db = null;
                }catch(PDOException $e){
                    echo '{"error" : {"text":'.$e->getMessage().'} }';
                }
            }
        }

        public static function deleteVideosByCourseId($courseId) {
            if($courseId) {
                $sql = "DELETE FROM `videos` WHERE course = ".$courseId.";";
            
                try{
                    $db = new db();
                    $db = $db->connection();
                    $result = $db->query($sql);
    
                    if (!$result) {
                        echo "Problema al hacer un query: " . $db->error;								
                    } else {
                        echo '{"message" : { "status": "200" , "text": "Videos del curso eliminados satisfactoriamente." } }';
                    }
    
                    $result = null;
                    $db = null;
                }catch(PDOException $e){
                    echo '{"error" : {"text":'.$e->getMessage().'} }';
                }
            }
        }

        public static function getDocumentByLessonId($lessonId) {
            if($lessonId) {
                $sql = "SELECT * FROM documents WHERE lesson = ".$lessonId.";";

                try{
                    $db = new db();
                    $db = $db->connection();
                    $result = $db->query($sql);
    
                    if($result) {
                        // Recorremos los resultados devueltos
                        while( $video = $result->fetch_assoc()) {
                            return $video;
                        }
                    }else {
                        echo json_encode("No existen el video en la BBDD.");
                        return null;
                    }
        
                    $result = null;
                    $db = null;
        
                }catch(PDOException $e){
                    echo '{"error" : {"text":'.$e->getMessage().'} }';
                }
            }    
        }

        public static function deleteDocumentByLessonId($lessonId) {
            if($lessonId) {
                $sql = "DELETE FROM `documents` WHERE lesson = ".$lessonId.";";
            
                try{
                    $db = new db();
                    $db = $db->connection();
                    $result = $db->query($sql);
    
                    if (!$result) {
                        echo "Problema al hacer un query: " . $db->error;								
                    } else {
                        echo '{"message" : { "status": "200" , "text": "Video de leccion eliminada satisfactoriamente." } }';
                    }
    
                    $result = null;
                    $db = null;
                }catch(PDOException $e){
                    echo '{"error" : {"text":'.$e->getMessage().'} }';
                }
            }
        }

        public static function deleteDocumentsByCourseId($courseId) {
            if($courseId) {
                $sql = "DELETE FROM `documents` WHERE course = ".$courseId.";";
            
                try{
                    $db = new db();
                    $db = $db->connection();
                    $result = $db->query($sql);
    
                    if (!$result) {
                        echo "Problema al hacer un query: " . $db->error;								
                    } else {
                        echo '{"message" : { "status": "200" , "text": "Videos del curso eliminados satisfactoriamente." } }';
                    }
    
                    $result = null;
                    $db = null;
                }catch(PDOException $e){
                    echo '{"error" : {"text":'.$e->getMessage().'} }';
                }
            }
        }
    }

?>
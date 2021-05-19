<?php 
    require_once 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/config/db.php';

    class LessonController {
        
        public static function addLesson($courseId, $lessonTitle, $lessonDescription) {
            if($lessonTitle) {
                $date = date('c');
                $sql = "INSERT INTO `lessons`(`title`, `decription`, `createdAt`, `course`) 
                VALUES ('".$lessonTitle."', '".$lessonDescription."', '".$date."', ".$courseId.")";
            }else{
                echo '{"message" : "No jaló la consulta"}';
            }

            try{
                $db = new db();
                $db = $db->connection();
                $result = $db->query($sql);

                if (!$result) {
                    echo "Problema al hacer un query: " . $db->error;								
                } else {
                    $last_id = mysqli_insert_id($db);
                    echo json_encode($last_id);
                }

                $result = null;
                $db = null;
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'} }';
            }
        }

        public static function updateLesson($lessonId, $lessonTitle, $lessonDescription) {
            if($lessonId) {
                $date = date('c');
                $sql = "UPDATE `lessons` SET `title`= '".$lessonTitle."', `decription`= '".$lessonDescription."', `createdAt`= '".$date."' WHERE id = ".$lessonId."";            
            
                try{
                    $db = new db();
                    $db = $db->connection();
                    $result = $db->query($sql);
    
                    if (!$result) {
                        echo "Problema al hacer un query: " . $db->error;								
                    } else {
                        echo '{"message" : { "status": "200" , "text": "Lección modificado satisfactoriamente." } }';
                    }
    
                    $result = null;
                    $db = null;
                }catch(PDOException $e){
                    echo '{"error" : {"text":'.$e->getMessage().'} }';
                }
            }
        }

        public static function deleteLessonByLessonId($lessonId) {
            if($lessonId) {
                $sql = "DELETE FROM `lessons` WHERE id = ".$lessonId.";";
            
                try{
                    $db = new db();
                    $db = $db->connection();
                    $result = $db->query($sql);
    
                    if (!$result) {
                        echo "Problema al hacer un query: " . $db->error;								
                    } else {
                        echo '{"message" : { "status": "200" , "text": "Lección eliminada satisfactoriamente." } }';
                    }
    
                    $result = null;
                    $db = null;
                }catch(PDOException $e){
                    echo '{"error" : {"text":'.$e->getMessage().'} }';
                }
            }
        }

        public static function deleteLessonsByCourseId($courseId) {
            if($courseId) {
                $sql = "DELETE FROM `lessons` WHERE course = ".$courseId.";";
            
                try{
                    $db = new db();
                    $db = $db->connection();
                    $result = $db->query($sql);
    
                    if (!$result) {
                        echo "Problema al hacer un query: " . $db->error;								
                    } else {
                        echo '{"message" : { "status": "200" , "text": "Lecciones eliminadas satisfactoriamente." } }';
                    }
    
                    $result = null;
                    $db = null;
                }catch(PDOException $e){
                    echo '{"error" : {"text":'.$e->getMessage().'} }';
                }
            }
        }

        public static function getLessonById($lessonId) {
            if($lessonId) {
                $sql = "SELECT * FROM lessons WHERE id = ".$lessonId.";";
                
                try{
                    $db = new db();
                    $db = $db->connection();
                    $result = $db->query($sql);
    
                    if($result) {
                        // Recorremos los resultados devueltos
                        while( $lesson = $result->fetch_assoc()) {
                            return $lesson;
                        }
                    }else {
                        echo json_encode("No existen la leccion en la BBDD.");
                        return null;
                    }
        
                    $result = null;
                    $db = null;
        
                }catch(PDOException $e){
                    echo '{"error" : {"text":'.$e->getMessage().'} }';
                }    
            }
        }

        public static function getLessonsByCourseId($courseId) {
            $sql = "SELECT * FROM lessons WHERE course = ".$courseId.";";

            try{
                $db = new db();
                $db = $db->connection();
                $result = $db->query($sql);

                if (!$result) {
                    echo "Problema al hacer un query: " . $db->error;								
                } else {
                    $cursos = array();
                    while($curso = $result->fetch_assoc()){
                        $cursos[] = $curso;
                    }
                    return $cursos;
                }

                $result = null;
                $db = null;
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'} }';
            }
        }

        public static function getLessonsView($lessonId) {
            if($lessonId) {
                $sql = "CALL `proc_get_lesson_content`(".$lessonId.");";
                
                try{
                    $db = new db();
                    $db = $db->connection();
                    $result = $db->query($sql);
    
                    if($result) {
                        // Recorremos los resultados devueltos
                        while( $lesson = $result->fetch_assoc()) {
                            return $lesson;
                        }
                    }else {
                        echo json_encode("No existen la leccion en la BBDD.");
                        return null;
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
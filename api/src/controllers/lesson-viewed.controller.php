<?php

require_once 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/config/db.php';

    class lessonViewedController{
        public static function addLessonViewed($lessonId, $userId, $courseId){
            if($lessonId){
                $sql = "INSERT INTO lesson_viewed(id_lesson, id_user, id_course)
                VALUES('".$lessonId."', '".$userId."', '".$courseId."')";
            } else{
                echo '{"message" : "No jaló la consulta edson no es papu pro equis de lmao lol based"}';
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

        public static function selectLessonViewedByUserCourse($courseId, $userId){
            if($courseId){
                $sql = "SELECT * FROM lesson_viewed WHERE id_user = '$userId' AND id_course = '$courseId'";
                try{
                    $db = new db();
                    $db = $db->connection();
                    $result = $db->query($sql);
    
                    if (!$result) {
                        echo "Problema al hacer un query: " . $db->error;								
                    } else {
                        $lessonViews = array();
                        while($view = $result->fetch_assoc()){
                            $lessonViews[] = $view;
                        }
                        return $lessonViews;
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
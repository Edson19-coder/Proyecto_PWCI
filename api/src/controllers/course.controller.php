<?php
    require_once 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/config/db.php';

    class CourseController{
        public static function addCourse($courseTitle, $shortDescription, $longDescription, $category, $price, $date, $instructor){
            if($courseTitle){
                $date = date('c');
                $sql = "INSERT INTO `courses`(`title`, `shortDescription`, `longDescription`, `category`, `price`, `createdAt`, `instructor`)
                 VALUES ('".$courseTitle."','".$shortDescription."','".$longDescription."',".$category.",'".$price."','".$date."', '.$instructor.');";
            }
            else{
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

        public static function updateCourse($id, $courseTitle, $shortDescription, $longDescription, $category, $price, $date){
            if($id){
                $date = date('c');
                $sql = "UPDATE courses SET courseTitle = '".$courseTitle."', shortDescription = '".$shortDescription."', longDescription = '".$longDescription."', category = '".$category."', 
                price = ".$price.", date = '".$date."' WHERE id = ".$id.";";
            }else{
                echo '{"message" : "No tiene un ID válido."}';
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

        public function getCourseById($id) {
            
            $sql = "CALL `proc_get_course`(".$id.")";
            try{
                $db = new db();
                $db = $db->connection();
                $result = $db->query($sql);

                if($result) {
                    // Recorremos los resultados devueltos
			        while( $course = $result->fetch_assoc()) {
                        return $course;
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

        public static function getCourseByTitle($courseTitle){
            if($courseTitle){
                $sql = "SELECT * FROM courses WHERE courseTitle LIKE '%$courseTitle%'";
            }else{
                echo '{"message" : "No tiene un título válido."}';
            }

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
                    var_dump(count($cursos));
                    return $cursos;
                }

                $result = null;
                $db = null;
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'} }';
            }
        }

        public static function getCourseByCategory($category){
            if($courseTitle){
                $sql = "SELECT * FROM courses WHERE courseTitle LIKE '%$category%'";
            }else{
                echo '{"message" : "No tiene un título válido."}';
            }

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
                    var_dump(count($cursos));
                    return $cursos;
                }

                $result = null;
                $db = null;
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'} }';
            }
        }
        
        public static function getCourseByTitleShortDescription($courseTitle, $shortDescription){
            if($courseTitle){
                $sql = "SELECT * FROM courses WHERE courseTitle LIKE '%$courseTitle%' OR shortDescription LIKE '%$shortDescription%'";
            }else{
                echo '{"message" : "No tiene un título válido."}';
            }

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
                    var_dump(count($cursos));
                    return $cursos;
                }

                $result = null;
                $db = null;
            }catch(PDOException $e){
                echo '{"error" : {"text":'.$e->getMessage().'} }';
            }
        }

        public static function getCourseLimit() {
            $sql = "CALL `proc_get_courses_recent`();";

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

        public static function getCourseByInstructor($instructorId) {
            $sql = "CALL `proc_get_course_instructor`(".$instructorId.");";

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
    }

?>
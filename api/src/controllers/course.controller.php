<?php
    require_once 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/config/db.php';

    class CourseController{
        public static function addCourse($courseTitle, $shortDescription, $longDescription, $category, $price, $date){
            if($courseTitle){
                $date = date('c');
                $sql = "INSERT INTO `courses`(`courseTitle`, `shortDescription`, `longDescription`, `category`, `price`, `date`)
                 VALUES ('".$courseTitle."','".$shortDescription."','".$longDescription."',".$category.",'".$price."','".$date."');";
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
                    echo '{"message" : { "status": "200" , "text": "Usuario creado satisfactoriamente." } }';
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

        public static function getCourseByTitle($category){
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
    }

?>
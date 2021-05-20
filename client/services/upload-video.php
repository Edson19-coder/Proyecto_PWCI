<?php 

require 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/config/db.php';

$video=$_FILES["video"]["name"];
$lessonId = $_POST["lessonId"];
$courseId = $_POST["courseId"];
$date = date('c');

if($video) {
    $rng = mt_rand(100, 2000);
    $ruta=$_FILES["video"]["tmp_name"];
    $destino="../../api/src/videos/".$rng.$video;
    move_uploaded_file($ruta, $destino);

    if($lessonId && $courseId) {
        $sql = "INSERT INTO `videos`(`video`, `lesson`, `createdAt`, `course`) VALUES ('".$destino."', ".$lessonId.", '".$date."', ".$courseId.")";
        $db = new db();
        $db = $db->connection();
        $result = $db->query($sql);

        if (!$result) {
            echo "Problema al hacer un query: " . $db->error;								
        } else {
            echo '{"message" : { "status": "200" , "text": "Video guardado correctamente." } }';
        }

        $result = null;
        $db = null;
    }
}

?>
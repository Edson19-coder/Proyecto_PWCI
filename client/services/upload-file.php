<?php 

require 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/config/db.php';

$file=$_FILES["file"]["name"];
$lessonId = $_POST["lessonId"];
$courseId = $_POST["courseId"];
$date = date('c');

if($file) {
    $rng = mt_rand(100, 2000);
    $ruta=$_FILES["file"]["tmp_name"];
    $destino="../../api/src/files/".$rng.$file;
    move_uploaded_file($ruta, $destino);

    if($lessonId && $courseId) {
        $sql = "INSERT INTO `documents`(`doc`, `lesson`, `createdAt`, `course`) VALUES ('".$destino."', ".$lessonId.", '".$date."', ".$courseId.")";
        $db = new db();
        $db = $db->connection();
        $result = $db->query($sql);

        if (!$result) {
            echo "Problema al hacer un query: " . $db->error;								
        } else {
            echo '{"message" : { "status": "200" , "text": "Documento guardado correctamente." } }';
        }

        $result = null;
        $db = null;
    }
}

?>
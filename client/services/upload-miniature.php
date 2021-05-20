<?php 

require 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/config/db.php';

$foto = $_FILES["foto"]["name"];
$id = $_POST["courseId"];

if($foto) {
    $rng = mt_rand(100, 2000);
    $ruta = $_FILES["foto"]["tmp_name"];
    $destino = "../../api/src/previews/".$rng.$foto;
    move_uploaded_file($ruta, $destino);

    if($id) {
        $sql = "UPDATE courses SET imageUrl = '".$destino."' WHERE id = ".$id.";";
        $db = new db();
        $db = $db->connection();
        $result = $db->query($sql);

        if (!$result) {
            echo "Problema al hacer un query: " . $db->error;								
        } else {
            echo '{"message" : { "status": "200" , "text": "Curso modificado satisfactoriamente." } }';
        }

        $result = null;
        $db = null;
    }
}

?>
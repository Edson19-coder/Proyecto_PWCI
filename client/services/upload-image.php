<?php 

require 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/config/db.php';

$foto=$_FILES["foto"]["name"];

if($foto) {
    $ruta=$_FILES["foto"]["tmp_name"];
    $destino="../../api/src/images/".$foto;
    move_uploaded_file($ruta, $destino);

    session_start();

    $id = $_SESSION['id'];

    if($id) {
        $sql = "UPDATE users SET profilePicture = '".$destino."' WHERE id = ".$id.";";
        echo $sql;
        $db = new db();
        $db = $db->connection();
        $result = $db->query($sql);

        if (!$result) {
            echo "Problema al hacer un query: " . $db->error;								
        } else {
            $_SESSION['profilePicture'] = $destino;
            echo '{"message" : { "status": "200" , "text": "Usuario modificado satisfactoriamente." } }';
        }

        $result = null;
        $db = null;
    }
}

header("location:../views/settings.php");
?>
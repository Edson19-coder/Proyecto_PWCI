<?php 

$file=$_FILES["file"]["name"];

if($file) {
    $ruta=$_FILES["file"]["tmp_name"];
    $destino="../../api/src/files/".$file;
    move_uploaded_file($ruta, $destino);
}

?>
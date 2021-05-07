<?php 

$video=$_FILES["video"]["name"];

if($video) {
    $ruta=$_FILES["video"]["tmp_name"];
    $destino="../../api/src/videos/".$video;
    move_uploaded_file($ruta, $destino);
}

?>
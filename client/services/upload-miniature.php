<?php 

$foto=$_FILES["foto"]["name"];

if($foto) {
    $ruta=$_FILES["foto"]["tmp_name"];
    $destino="../../api/src/images/".$foto;
    move_uploaded_file($ruta, $destino);
}

?>
<?php 
    if(isset($_REQUEST["addToCart"])) {
        session_start();
        
        $id = $_REQUEST["idCourse"];
        $nameCourse = $_REQUEST["nameCourse"];
        $instructorCourse = $_REQUEST["instructorCourse"];
        $price = $_REQUEST["price"];

        $_SESSION["cart"][$id]["nameCourse"] = $nameCourse;
        $_SESSION["cart"][$id]["instructorCourse"] = $instructorCourse;
        $_SESSION["cart"][$id]["price"] = $price;

        if(isset($_SESSION["cart"])) {
            foreach($_SESSION["cart"] as $indice => $arreglo) {
                echo "id: ".$indice."<br>";
                foreach($arreglo as $key => $value) {
                    echo $key.": ".$value;
                }
            }
            echo $_SESSION["cart"][$id];
        }

        //header("location:../views/course.php?course=".$id);
    }

?>
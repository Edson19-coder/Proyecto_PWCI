<?php 

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    $app->post('/addCourse', function(Request $request, Response $response){
        
        $courseTitle = $request->getParam('courseTitle');
        $shortDescription = $request->getParam('shortDescription');
        $longDescription = $request->getParam('longDescription');
        $categorie = $request->getParam('categorie');
        $price = $request->getParam('price');

        echo '{"message" : { "status": "200" , "text": "Curso creado correctamente." } }';
    });

    //Esto va en routes/lesson.php

    $app->post('/addLesson', function(Request $request, Response $response){
        
        $lessonTitle = $request->getParam('lessonTitle');
        $lessonDescription = $request->getParam('lessonDescription');

        echo '{"message" : { "status": "200" , "text": "Leccion creado correctamente." } }';
    });

?>
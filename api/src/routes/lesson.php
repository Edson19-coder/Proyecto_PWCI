<?php 

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    date_default_timezone_set('America/Monterrey');

    //Esto va en routes/lesson.php

    $app->post('/addLesson', function(Request $request, Response $response){
        
        $lessonTitle = $request->getParam('lessonTitle');
        $lessonDescription = $request->getParam('lessonDescription');

        echo '{"message" : { "status": "200" , "text": "Leccion creado correctamente." } }';
    });
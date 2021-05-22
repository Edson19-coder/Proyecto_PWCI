<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;
    date_default_timezone_set('America/Monterrey');

    require_once 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/controllers/lesson-vi.controller.php';

    $app->post('/addLessonViewed', function(Request $request, Response $response){
        $lessonId = $request->getParam('lessonId');
        $userId = $request->getParam('userId');
        $courseId = $request->getParam('courseId');

        if($courseId != null && $userId != null && $lessonId != null){
            lessonViewedController::addLessonViewed($lessonId, $userId, $courseId);
        } else{
            echo '{"message" : { "status": "400" , "text": "pinchimadre" } }';
        }
    });

    $app->post('/selectLessonViewedByUserCourse', function(Request $request, Response $response){
        $courseId = $request->getAttribute('lessonId');
        $userId = $request->getAttribute('userId');
        if($courseId && $userId){
            $lessonViewed = lessonViewedController::selectLessonViewedByUserCourse($courseId, $userId);
        } else{
            echo '{"message" : { "status": "400" , "text": "Ima baaaaad guy; duh" } }';
        }
    })
?>
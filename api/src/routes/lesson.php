<?php 

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    date_default_timezone_set('America/Monterrey');

    require_once 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/controllers/lesson.controller.php';

    $app->post('/addLesson', function(Request $request, Response $response) {
        
        $courseId = $request->getParam('courseId');
        $lessonTitle = $request->getParam('lessonTitle');
        $lessonDescription = $request->getParam('lessonDescription');

        if($courseId != null && $lessonTitle != null) {
            LessonController::addLesson($courseId, $lessonTitle, $lessonDescription);
        } else {
            echo '{"message" : { "status": "400" , "text": "BadRequest" } }';
        }
    });

    $app->post('/updateLesson', function(Request $request, Response $response) {

        $lessonId = $request->getParam('lessonId');
        $lessonTitle = $request->getParam('lessonTitle');
        $lessonDescription = $request->getParam('lessonDescription');

        if($lessonId) {
            LessonController::updateLesson($lessonId, $lessonTitle, $lessonDescription);
        } else {
            echo '{"message" : { "status": "400" , "text": "BadRequest" } }';
        }
    });

    $app->post('/deleteLessonByLessonId/{lessonId}', function(Request $request, Response $response) {
        
        $lessonId = $request->getAttribute('lessonId');
        
        if($lessonId) {
            LessonController::deleteLessonByLessonId($lessonId);
        } else {
            echo '{"message" : { "status": "400" , "text": "BadRequest" } }';
        }
    });

    $app->post('/deleteLessonsByCourseId/{courseId}', function(Request $request, Response $response) {
        
        $courseId = $request->getAttribute('courseId');
        
        if($courseId) {
            LessonController::deleteLessonsByCourseId($courseId);
        } else {
            echo '{"message" : { "status": "400" , "text": "BadRequest" } }';
        }
    });

    $app->get('/getLessonById/{lessonId}', function(Request $request, Response $response) {
        
        $lessonId = $request->getAttribute('lessonId');

        if($lessonId) {
            $lesson = LessonController::getLessonById($lessonId);

            if($lesson) {
                echo json_encode($lesson);
            } else {
                echo '{"message" : { "status": "404" , "text": "No se puede identificar esta lección." } }';
            }
        } else {
            echo '{"message" : { "status": "400" , "text": "BadRequest" } }';
        }
    });

    $app->get('/getLessonsByCourseId/{courseId}', function(Request $request, Response $response) {
        
        $courseId = $request->getAttribute('courseId');

        if($courseId) {
            $lessons = LessonController::getLessonsByCourseId($courseId);

            if($lessons) {
                echo json_encode($lessons);
            } else {
                echo '{"message" : { "status": "404" , "text": "No se puede identificar esta lección." } }';
            }
        } else {
            echo '{"message" : { "status": "400" , "text": "BadRequest" } }';
        }
    });

    $app->get('/getLessonsView/{lessonId}', function(Request $request, Response $response) {
        
        $lessonId = $request->getAttribute('lessonId');

        if($lessonId) {
            $lesson = LessonController::getLessonsView($lessonId);

            if($lesson) {
                echo json_encode($lesson);
            } else {
                echo '{"message" : { "status": "404" , "text": "No se puede identificar esta lección." } }';
            }
        } else {
            echo '{"message" : { "status": "400" , "text": "BadRequest" } }';
        }
    });

?>
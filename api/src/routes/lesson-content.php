<?php 

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    date_default_timezone_set('America/Monterrey');

    require_once 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/controllers/lesson-content.controller.php';

    $app->get('/getVideoByLessonId/{lessonId}', function(Request $request, Response $response) {
        
        $lessonId = $request->getAttribute('lessonId');

        if($lessonId) {
            
        }
    });

    $app->post('/deleteVideoByLessonId/{lessonId}', function(Request $request, Response $response) {
        
        $lessonId = $request->getAttribute('lessonId');

        if($lessonId) {
            
        }
    });

    $app->post('/deleteVideosByCourseId/{courseId}', function(Request $request, Response $response) {
        
        $courseId = $request->getAttribute('courseId');

        if($courseId) {
            
        }
    });

    $app->get('/getDocumentByLessonId/{lessonId}', function(Request $request, Response $response) {
        
        $lessonId = $request->getAttribute('lessonId');

        if($lessonId) {
            
        }
    });

    $app->post('/deleteDocumentByLessonId/{lessonId}', function(Request $request, Response $response) {
        
        $lessonId = $request->getAttribute('lessonId');

        if($lessonId) {
            
        }
    });

    $app->post('/deleteDocumentsByCourseId/{courseId}', function(Request $request, Response $response) {
        
        $courseId = $request->getAttribute('courseId');

        if($courseId) {
            
        }
    });
?>
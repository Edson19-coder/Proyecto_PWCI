<?php 

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    date_default_timezone_set('America/Monterrey');

    require_once 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/controllers/course.controller.php';
    require_once 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/models/course.model.php';

    $app->post('/addCourse', function(Request $request, Response $response){
        
        if($request->getParam('courseTitle')){
            CourseController::addCourse($request->getParam('courseTitle'), $request->getParam('shortDescription'), $request->getParam('longDescription'), 
            $request->getParam('category'), $request->getParam('price'), $request->getParam('date'), $request->getParam('instructor'));
        }
        else{
            echo '{"message" : { "status": "500" , "text": "Server error" } }';
        }
    });

    $app->post('/updateCourse', function(Request $request, Response $response){
        if($request->getParam('courseTitle') && $request->getParam('category')){
            CourseController::updateCourse($request->getParam('id'), $request->getParam('courseTitle'), $request->getParam('shortDescription'), $request->getParam('longDescription'), 
            $request->getParam('category'), $request->getParam('price'), $request->getParam('date'));
        }else{
            echo '{"message" : { "status": "500" , "text": "No jala el server." } }';
        }
    });

    $app->post('/getCourseById/{course}', function(Request $request, Response $response){
        if($request->getAttribute('course')) {
            $course = CourseController::getCourseById($request->getAttribute('course'));
            if($course) {
                echo json_encode($course);
            } else {
                echo '{"message" : { "status": "404" , "text": "No se puede identificar este usuario." } }';
            }
        } else {
            echo '{"message" : { "status": "400" , "text": "Bad Request" } }';
        }
    });

    $app->get('/getCourseByTitle', function(Request $request, Response $response){
        if($request->getParam('courseTitle')){
            CourseController::getCourseByTitle($request->getParam('courseTitle'));
        }else{
            echo '{"message" : { "status": "500" , "text": "No jala el server." } }';
        }
    });

    $app->post('/getCourseByCategory', function(Request $request, Response $response){
        if($request->getParam('category')){
            CourseController::getCourseByTitle($request->getParam('category'));
        }else{
            echo '{"message" : { "status": "500" , "text": "No jala el server." } }';
        }
    });

    $app->get('/getCourseByTitleShortDescription', function(Request $request, Response $response){
        if($request->getParam('courseTitle') || $request->getParam('courseTitle')){
            CourseController::getCourseByTitleShortDescription($request->getParam('courseTitle'), $request->getParam('shortDescription'));
        }else{
            echo '{"message" : { "status": "500" , "text": "No jala el server." } }';
        }
    });

    $app->get('/getCoursesoLimit', function(Request $request, Response $response){
        $courses = CourseController::getCourseLimit();
        
        if($courses) {
            echo json_encode($courses);
        } else {
            echo '{"message" : { "status": "200" , "text": "No hay cursos registrados." } }';
        }
    });
?>
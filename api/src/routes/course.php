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

    $app->get('/getCourseLimit', function(Request $request, Response $response){
        $courses = CourseController::getCourseLimit();
        
        if($courses) {
            echo json_encode($courses);
        } else {
            echo '{"message" : { "status": "200" , "text": "No hay cursos registrados." } }';
        }
    });

    $app->get('/getCourseByInstructor/{instructorId}', function(Request $request, Response $response){
        
        $instructorId = $request->getAttribute('instructorId');

        if($instructorId) {
            $courses = CourseController::getCourseByInstructor($instructorId);
        
            if($courses) {
                echo json_encode($courses);
            } else {
                echo '{"message" : { "status": "200" , "text": "No hay cursos registrados." } }';
            }
        } else {
            echo '{"message" : { "status": "400" , "text": "Bad Request" } }';
        }

    });

    $app->get('/getCourseSearch/{search}', function(Request $request, Response $response){
        $text = $request->getAttribute('search');

        if($text) {
            $courses = CourseController::getCourseSearch($text);
        
            if($courses) {
                echo json_encode($courses);
            } else {
                echo '{"message" : { "status": "200" , "text": "No hay cursos registrados." } }';
            }
        } else {
            echo '{"message" : { "status": "400" , "text": "Bad Request" } }';
        }

    });

    $app->get('/getCourseByCategorieId/{categorieId}', function(Request $request, Response $response){
        $categorieId = $request->getAttribute('categorieId');

        if($categorieId) {
            $courses = CourseController::getCourseByCategorieId($categorieId);
        
            if($courses) {
                echo json_encode($courses);
            } else {
                echo '{"message" : { "status": "200" , "text": "No hay cursos registrados." } }';
            }
        } else {
            echo '{"message" : { "status": "400" , "text": "Bad Request" } }';
        }

    });

    $app->get('/getCourseByPuchases/{userId}', function(Request $request, Response $response){
        $userId = $request->getAttribute('userId');

        if($userId) {
            $courses = CourseController::getCourseByPuchases($userId);
        
            if($courses) {
                echo json_encode($courses);
            } else {
                echo '{"message" : { "status": "200" , "text": "No hay cursos registrados." } }';
            }
        } else {
            echo '{"message" : { "status": "400" , "text": "Bad Request" } }';
        }

    });

    $app->post('/getPorcentaje', function(Request $request, Response $response){
        if($request->getParam('courseId')){
            CourseController::getPorcentaje($request->getParam('courseId'), $request->getParam('userId'));
        }else{
            echo '{"message" : { "status": "500" , "text": "No jala el server." } }';
        }
    });

    $app->get('/getReport/{userId}', function(Request $request, Response $response){
        $userId = $request->getAttribute('userId');

        if($userId) {
            $courses = CourseController::getReport($userId);
        
            if($courses) {
                echo json_encode($courses);
            } else {
                echo '{"message" : { "status": "200" , "text": "No hay cursos registrados." } }';
            }
        } else {
            echo '{"message" : { "status": "400" , "text": "Bad Request" } }';
        }

    });
?>
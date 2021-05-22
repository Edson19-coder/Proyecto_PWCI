<?php 

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    require_once 'C:\xampp\htdocs\projects\Proyecto_PWCI\api\src\controllers\commentary.controller.php';

    $app->post('/addCommentary', function(Request $request, Response $response) {
        if($request->getParam('txtCommentary') && $request->getParam('emmiter') && $request->getParam('course')) {
            CommentaryController::addCommentary($request->getParam('txtCommentary'), $request->getParam('emmiter'), $request->getParam('course'));
        } else {
            echo '{"message" : { "status": "400" , "text": "Bad request" } }';   
        }
    });

    $app->get('/getCommentsByCourse/{courseId}', function(Request $request, Response $response) {
        $courseId = $request->getAttribute('courseId');

        if($courseId) {
            $comments = CommentaryController::getCommentsByCourse($courseId);
            
            if($comments) {
                echo json_encode($comments);
            } else {
                echo '{"message" : { "status": "400" , "text": "Vacio" } }';   
            }

        } else {
            echo '{"message" : { "status": "400" , "text": "Bad request" } }';
        }
    });

?>
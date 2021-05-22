<?php 

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    require_once 'C:\xampp\htdocs\projects\Proyecto_PWCI\api\src\controllers\chat.controller.php';

    $app->post('/addMessage', function(Request $request, Response $response) {
        if($request->getParam('textMessage') && $request->getParam('emmiter') && $request->getParam('receiver')) {
            ChatController::addMessage($request->getParam('textMessage'), $request->getParam('emmiter'), $request->getParam('receiver'));
        } else {
            echo '{"message" : { "status": "400" , "text": "Bad request" } }';   
        }
    });

    $app->post('/getMessagesByUser', function(Request $request, Response $response) {
        $me = $request->getParam('me');
        $friend = $request->getParam('friend');

        if($me && $friend) {
            $messages = ChatController::getMessagesByUser($me, $friend);
            
            if($messages) {
                echo json_encode($messages);
            } else {
                echo '{"message" : { "status": "400" , "text": "Vacio" } }';   
            }

        } else {
            echo '{"message" : { "status": "400" , "text": "Bad request" } }';
        }
    });

?>
<?php 

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;
    
    require_once 'C:\xampp\htdocs\projects\Proyecto_PWCI\api\src\controllers\cart.controller.php';

    $app->post('/addCart', function(Request $request, Response $response){
        if($request->getParam('userId') && $request->getParam('courseId')) {
            CartController::addCart($request->getParam('userId'), $request->getParam('courseId'));
        } else {
            echo '{"message" : { "status": "400" , "text": "Bad request" } }';    
        }
    });

    $app->get('/getCart/{idUser}', function(Request $request, Response $response) {
        if($request->getAttribute('idUser')) {
            $cart = CartController::getCartByUser($request->getAttribute('idUser'));
            if($cart != null) {
                echo json_encode($cart);
            } else {
                echo '{"message" : { "status": "400" , "text": "Bad request" } }';       
            }
        } else {
            echo '{"message" : { "status": "400" , "text": "Bad request" } }';                
        }
    });

    $app->get('/getCartCountItems/{idUser}', function(Request $request, Response $response) {
        if($request->getAttribute('idUser')) {
            $count = CartController::getCartCountItems($request->getAttribute('idUser'));
            echo json_encode($count);
        } else {
            echo '{"message" : { "status": "400" , "text": "Bad request" } }';                
        }
    });

    $app->post('/deleteItemCart/{item}', function(Request $request, Response $response) {
        if($request->getAttribute('item')) {
            CartController::deleteItem($request->getAttribute('item'));
        } else {
            echo '{"message" : { "status": "400" , "text": "Bad request" } }';    
        }
    });

    $app->post('/deleteCart/{user}', function(Request $request, Response $response) {
        if($request->getAttribute('user')) {
            CartController::deleteCart($request->getAttribute('user'));
        } else {
            echo '{"message" : { "status": "400" , "text": "Bad request" } }';    
        }
    });

?>
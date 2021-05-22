<?php

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    require_once 'C:\xampp\htdocs\projects\Proyecto_PWCI\api\src\controllers\purchases.controller.php';

    $app->post('/addPurchase', function(Request $request, Response $response){
        if($request->getParam('userId') && $request->getParam('courseId')){
            purchasesController::addPurchase($request->getParam('userId'), $request->getParam('courseId'));
        } else{
            echo '{"message" : { "status": "400" , "text": "Bad request" } }';
        }
    });

    $app->get('/getUserPurchases/{idUser}', function(Request $request, Response $response) {
        if($request->getAttribute('idUser')){
            $purchases = purchasesController::getUserPurchases($request->getAttribute('idUser'));
            
            if($purchases) {
                echo json_encode($purchases);
            }
        } else{
            echo '{"message" : { "status": "500" , "text": "No jala el server papu edson alv aiuda jefesita :´vVvvV." } }';
        }
    });

    $app->post('/deletePurchase/{purchase}', function(Request $request, Response $response){
        if($request->getAttribute('purchase')){
            purchasesController::deletePurchase($request->getAttribute('purchase'));
        } else{
            echo '{"message" : { "status": "400" , "text": "Bad request" } }';
        }
    });

    
?>
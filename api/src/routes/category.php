<?php 

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    date_default_timezone_set('America/Monterrey');

    require_once 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/controllers/category.controller.php';

    $app->post('/addCategory', function(Request $request, Response $response) {
        if($request->getParam('categoryName')) {
            CategoryController::addCategory($request->getParam('categoryName'), $request->getParam('date'));
        } else {
            echo '{"message" : { "status": "400" , "text": "Bad request." } }';
        }
    });

    $app->get('/getCategories', function(Request $request, Response $response) {
        $categories = CategoryController::getCategories();

        if($categories) {
            echo json_encode($categories);
        }
        
    });

?>
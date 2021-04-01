<?php 

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    $app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);
    
    require 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/controllers/user.php';

    $app->get('/users', function(Request $request, Response $response){
        $userController = new UserController(); 
        $users = $userController->getAllUsers();
        if($users != null) {
            echo json_encode($users);
            //echo '{"message" : { "status": "200" , "text": "Satisfactory process" }';
        } else {
            echo '{"message" : { "status": "500" , "text": "Server error" }';
        }
    });

?>
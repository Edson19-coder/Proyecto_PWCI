<?php 

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    require '../vendor/autoload.php';

    header('Access-Control-Allow-Origin: *');
    
    $app = new \Slim\App;

    //User routes
    require '../src/routes/user.php';

    // Run app
    $app->run();
?>
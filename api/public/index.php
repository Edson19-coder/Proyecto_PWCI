<?php 

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    require '../vendor/autoload.php';

    //header('Access-Control-Allow-Origin: *');
    
    $app = new \Slim\App;

    $app->add(function ($req, $res, $next) {
        $response = $next($req, $res);
        return $response
                ->withHeader('Access-Control-Allow-Origin', 'localhost')
                ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    });

    //User routes
    require '../src/routes/user.php';
    //Course routes
    require '../src/routes/course.php';
    //Category routes
    require '../src/routes/category.php';
    //Cart routes
    require '../src/routes/cart.php';
    //Lesson routes
    require '../src/routes/lesson.php';
    //Chat routes
    require '../src/routes/chat.php';
    //Comments routes
    require '../src/routes/commentary.php';

    // Run app
    $app->run();
?>
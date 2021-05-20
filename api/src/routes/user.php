<?php 

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    $app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);
    date_default_timezone_set('America/Monterrey');

    require_once 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/controllers/user.controller.php';
    require_once 'C:/xampp/htdocs/projects/Proyecto_PWCI/api/src/models/user.model.php';

    /*              TODOS LOS INSERT         */
    $app->post('/addUser', function(Request $request, Response $response){

        if($request->getParam('userName') && $request->getParam('email') && $request->getParam('userPassword') && $request->getParam('firstName') && $request->getParam('lastName') && $request->getParam('accountType')) {
            if($request->getParam('secondName')) {
                UserController::addUser($request->getParam('email'), $request->getParam('userPassword'), $request->getParam('userName'), $request->getParam('firstName'), 
                $request->getParam('secondName'), $request->getParam('lastName'), $request->getParam('accountType'));
            } else {
                UserController::addUser($request->getParam('email'), $request->getParam('userPassword'), $request->getParam('userName'), $request->getParam('firstName'), 
                null, $request->getParam('lastName'), $request->getParam('accountType'));
            }
        } else {
            echo '{"message" : { "status": "500" , "text": "Server error" } }';
        }
    });

    /*          TODOS LOS UPDATE        */
    $app->post('/updateUser', function(Request $request, Response $response){
        if($request->getParam('userName') && $request->getParam('email')){

            UserController::updateUser($request->getParam('id'), $request->getParam('email'), $request->getParam('userPassword'), $request->getParam('userName'), 
            $request->getParam('firstName'), $request->getParam('secondName'), $request->getParam('lastName'), $request->getParam('birthday'), $request->getParam('country'), 
            $request->getParam('state'), $request->getParam('city'), $request->getParam('postalCode'), $request->getParam('profilePicture'), $request->getParam('accountType'));
        }else{
            echo '{"message" : { "status": "500" , "text": "No jala el server." } }';
        }
    });
    
    /*          TODOS LOS SELECT        */
    $app->post('/getUserByEmailPassword', function(Request $request, Response $response){
        if($request->getParam('email') && $request->getParam('userPassword')) {
            $email = $request->getParam('email');
            $password = $request->getParam('userPassword');

            $user = UserController::getUserByEmailPassword($email, $password);
            if($user){
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username']; 
                $_SESSION['email'] = $user['email'];
                $_SESSION['firstName'] = $user['firstName'];
                $_SESSION['lastNames'] = $user['lastNames'];
                $_SESSION['profilePicture'] = $user['profilePicture'];
                $_SESSION['accountType'] = $user['accountType'];

                echo json_encode($user);
            }else{
                echo '{"message" : { "status": "404" , "text": "No se puede identificar este usuario." } }';
            }
        } else {
            echo '{"message" : { "status": "500" , "text": "Server error" } }';
        }
    });

    $app->get('/getUserByUsername', function(Request $request, Response $response){
        if($request->getParam('username')){
            $username = $request->getParam('username');

            $user = UserController::getUserByUsername($username);
            if($user){
                echo json_encode($user);
            }else{
                echo '{"message" : { "status": "404" , "text": "No se puede identificar este usuario." } }';
            }
        }else{
            echo '{"message" : { "status": "500" , "text": "Server error" } }';
        }
    });

    $app->post('/getUserById', function(Request $request, Response $response){
        if($request->getParam('id')) {
            $user = UserController::getUserById($request->getParam('id'));
            if($user) {
                echo json_encode($user);
            } else {
                echo '{"message" : { "status": "404" , "text": "No se puede identificar este usuario." } }';
            }
        } else {
            echo '{"message" : { "status": "400" , "text": "Bad Request" } }';
        }
    });

    $app->post('/getUserById/{id}', function(Request $request, Response $response){
        if($request->getAttribute('id')) {
            $user = UserController::getUserById($request->getAttribute('id'));
            if($user) {
                echo json_encode($user);
            } else {
                echo '{"message" : { "status": "404" , "text": "No se puede identificar este usuario." } }';
            }
        } else {
            echo '{"message" : { "status": "400" , "text": "Bad Request" } }';
        }
    });

    $app->get('/getAllUsers', function(Request $request, Response $response){
        $users = UserController::getAllUsers();
        if($users != null) {
            echo json_encode($users);
            //echo '{"message" : { "status": "200" , "text": "Satisfactory process" } }';
        } else {
            echo '{"message" : { "status": "500" , "text": "Sin usuarios registrados." } }';
        }
    });
?>
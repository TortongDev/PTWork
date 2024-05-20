<?php

    require_once dirname(__DIR__)."/App/vendor/autoload.php";
    $router = new AltoRouter();
    $router->setBasePath('/PTWork/App');
    
    
    $router->map( 'GET', '/', function() {
        echo "PTWork";
    });
    $router->map( 'GET', '/user', function() {
    // require __DIR__ . '';
        echo "Hi User";
    });
    $router->map( 'GET', '/usercontroller1/[*:username]/[*:password]/[*:email]', function($username,$password,$email){
        require_once dirname(__DIR__)."/App/Controllers/UserController.php";
        $user = new UserController();
        $user->store($username, $password, $email);
    });
    
    $router->map( 'POST', '/post', function(){
        require_once dirname(__DIR__)."/App/Controllers/AssignWorkController.php";
        $user = new AssignWorkController();
        $user->postRequest();
    });
?>
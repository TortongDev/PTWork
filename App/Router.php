<?php

    require_once dirname(__DIR__)."/App/vendor/autoload.php";
    require_once dirname(__DIR__)."/App/Controllers/UserController.php";
    $router = new AltoRouter();
    $router->setBasePath('/PTWork/App');
    
    
    $router->map( 'GET', '/', function() {
        echo "PTWork";
    });
    $router->map( 'GET', '/user', function() {
    // require __DIR__ . '';
        echo "Hi User";
    });
    $router->map( 'GET', '/usercontroller1/[i:id]', function($id){
        $user = new UserController();
        $user->store1($id);
    });

   
?>
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

    $match = $router->match();
        // call closure or throw 404 status
     if( is_array($match) && is_callable( $match['target'] ) ) {
        call_user_func_array( $match['target'], $match['params'] );
     } else {
        // no route was matched
        //  header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
     }
?>
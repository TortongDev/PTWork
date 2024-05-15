<?php
    require_once dirname(__DIR__)."/App/vendor/autoload.php";
    $router = new AltoRouter();
    $router->setBasePath('/PTWork/App');
    $router->map( 'GET', '/', function() {
        require __DIR__ . '/views/home.php';
    });
    // map user details page
    $router->map( 'GET', '/user', function() {
    // require __DIR__ . '';
        echo "Hi User";
    });

    // match current request url
    $match = $router->match();

    // call closure or throw 404 status
    if( is_array($match) && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] );
    } else {
    // no route was matched
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    }
?>
<?php
    require_once dirname(__DIR__)."/App/vendor/autoload.php";
    $router = new AltoRouter();
    $router->setBasePath('/PTWork/App');
    require_once "./Router.php";
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
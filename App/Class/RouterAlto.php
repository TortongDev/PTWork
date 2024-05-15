<?php
    require_once dirname(__DIR__)."/vendor/autoload.php";

class RouterAlto {
    public function __construct(){
        $router = new AltoRouter();

        $match = $router->match();

        // call closure or throw 404 status
        if( is_array($match) && is_callable( $match['target'] ) ) {
        call_user_func_array( $match['target'], $match['params'] );
        } else {
        // no route was matched
        header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
        }
    }
}

?>
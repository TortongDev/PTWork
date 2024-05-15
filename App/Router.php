<?php
   
    $router->map( 'GET', '/', function() {
        echo "PTWork";
    });
    $router->map( 'GET', '/user', function() {
    // require __DIR__ . '';
        echo "Hi User";
    });

    
?>